Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

Set-Location 'd:/Personal Work/AAPSCM-LARAVEL'

$archiveRoot = 'archive/replaced-by-mirror/2026-05-04'
$controller = Get-Content 'app/Http/Controllers/CmsPageController.php' -Raw
$certBlock = [regex]::Match(
    $controller,
    'private const CERTIFICATION_MIRROR_SLUGS = \[(?<body>.*?)\];',
    [System.Text.RegularExpressions.RegexOptions]::Singleline
).Groups['body'].Value

$slugViewsBlock = [regex]::Match(
    $controller,
    'private const SLUG_VIEWS = \[(?<body>.*?)\];',
    [System.Text.RegularExpressions.RegexOptions]::Singleline
).Groups['body'].Value

$certSlugs = [regex]::Matches($certBlock, '''(?<slug>[^'']+)''|"(?<slug2>[^"]+)"') | ForEach-Object {
    if ($_.Groups['slug'].Success) {
        $_.Groups['slug'].Value
    } else {
        $_.Groups['slug2'].Value
    }
}

$slugViewPairs = [regex]::Matches($slugViewsBlock, '''(?<slug>[^'']+)''\s*=>\s*''cms\.page\.(?<view>[^'']+)''') | ForEach-Object {
    [pscustomobject]@{
        Slug = $_.Groups['slug'].Value
        View = $_.Groups['view'].Value
    }
}

$mirrorSlugs = [System.Collections.Generic.HashSet[string]]::new([System.StringComparer]::OrdinalIgnoreCase)

foreach ($slug in $certSlugs) {
    [void] $mirrorSlugs.Add($slug)
}

foreach ($pair in $slugViewPairs) {
    if ($pair.View -match 'mirror') {
        [void] $mirrorSlugs.Add($pair.Slug)
    }
}

$viewCandidates = [System.Collections.Generic.HashSet[string]]::new([System.StringComparer]::OrdinalIgnoreCase)

foreach ($pair in $slugViewPairs) {
    $slugView = "resources/views/cms/page/$($pair.Slug).blade.php"

    if ($pair.View -ne $pair.Slug -and (Test-Path $slugView)) {
        [void] $viewCandidates.Add($slugView)
    }

    if ($certSlugs.Contains($pair.Slug)) {
        $mappedView = "resources/views/cms/page/$($pair.View).blade.php"

        if (Test-Path $mappedView) {
            [void] $viewCandidates.Add($mappedView)
        }
    }
}

$seederCandidates = [System.Collections.Generic.HashSet[string]]::new([System.StringComparer]::OrdinalIgnoreCase)

Get-ChildItem 'database/seeders' -Filter '*PageSeeder.php' | ForEach-Object {
    if ($_.Name -like '*MirrorPageSeeder.php') {
        return
    }

    $content = Get-Content $_.FullName -Raw
    $slug = $null

    if ($content -match "\['slug'\s*=>\s*'([^']+)'\]") {
        $slug = $Matches[1]
    } elseif ($content -match "return\s+'([^']+)';") {
        $slug = $Matches[1]
    }

    if ($null -ne $slug -and $mirrorSlugs.Contains($slug)) {
        $relativePath = $_.FullName.Substring(((Get-Location).Path.Length + 1)).Replace('\\', '/')
        [void] $seederCandidates.Add($relativePath)
    }
}

$dataCandidates = @(
    'database/seeders/data/certifications_faq_data.php',
    'database/seeders/data/certification_process_data.php',
    'database/seeders/data/us_charters_data.php'
) | Where-Object { Test-Path $_ }

$allCandidates = @($viewCandidates | Sort-Object) + @($seederCandidates | Sort-Object) + @($dataCandidates | Sort-Object)

foreach ($relativePath in $allCandidates) {
    $destination = Join-Path $archiveRoot $relativePath
    $destinationDir = Split-Path $destination -Parent

    if (!(Test-Path $destinationDir)) {
        New-Item -ItemType Directory -Force -Path $destinationDir | Out-Null
    }

    Move-Item -LiteralPath $relativePath -Destination $destination -Force
}

Write-Output ('views=' + $viewCandidates.Count)
Write-Output ('seeders=' + $seederCandidates.Count)
Write-Output ('data=' + @($dataCandidates).Count)
Write-Output ('moved=' + $allCandidates.Count)
