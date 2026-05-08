Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

Set-Location 'd:/Personal Work/AAPSCM-LARAVEL'

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

$certSlugs = [System.Collections.Generic.HashSet[string]]::new([System.StringComparer]::OrdinalIgnoreCase)

[regex]::Matches($certBlock, '''(?<slug>[^'']+)''|"(?<slug2>[^"]+)"') | ForEach-Object {
    if ($_.Groups['slug'].Success) {
        [void] $certSlugs.Add($_.Groups['slug'].Value)
    } elseif ($_.Groups['slug2'].Success) {
        [void] $certSlugs.Add($_.Groups['slug2'].Value)
    }
}

$missing = [System.Collections.Generic.HashSet[string]]::new([System.StringComparer]::OrdinalIgnoreCase)

if (-not (Test-Path 'resources/views/cms/page/certification-exact-mirror.blade.php')) {
    [void] $missing.Add('certification-exact-mirror')
}

[regex]::Matches($slugViewsBlock, '''(?<slug>[^'']+)''\s*=>\s*''cms\.page\.(?<view>[^'']+)''') | ForEach-Object {
    $slug = $_.Groups['slug'].Value
    $view = $_.Groups['view'].Value

    if ($certSlugs.Contains($slug)) {
        return
    }

    if (-not (Test-Path "resources/views/cms/page/$view.blade.php")) {
        [void] $missing.Add($view)
    }
}

$missing | Sort-Object | ForEach-Object { Write-Output $_ }
Write-Output ('missing=' + $missing.Count)
