/**
 * AAPSCM Visual Page Builder — GrapesJS initialization
 * All block HTML uses Tailwind v3 classes (scanned by tailwind.config.js)
 */

import grapesjs from 'grapesjs';
import 'grapesjs/dist/css/grapes.min.css';

// ─────────────────────────────────────────────────────────────────────────────
// Configuration injected from the Blade view
// ─────────────────────────────────────────────────────────────────────────────
const cfg = window.BUILDER_CONFIG || {};

// ─────────────────────────────────────────────────────────────────────────────
// Block definitions — AAPSCM design system
// ─────────────────────────────────────────────────────────────────────────────
const BLOCKS = [

    // ── SECTIONS ─────────────────────────────────────────────────────────────

    {
        id: 'hero-blue',
        label: 'Hero (Blue)',
        category: 'Sections',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#0B2F5E" rx="3"/><text x="30" y="16" text-anchor="middle" fill="white" font-size="6" font-weight="bold">HEADING</text><rect x="10" y="21" width="40" height="3" fill="#3B82F6" rx="1.5"/><rect x="20" y="27" width="20" height="5" fill="#FBBF24" rx="2.5"/></svg>`,
        content: `
<section class="relative bg-[#0B2F5E] text-white py-24">
  <div class="max-w-5xl mx-auto px-6 text-center">
    <h1 class="text-5xl font-extrabold leading-tight mb-6">Your Main Heading Here</h1>
    <p class="text-xl text-blue-200 mb-10 max-w-2xl mx-auto">A compelling subheading that supports your main message and drives visitors to take action.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#" class="inline-block bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition-colors shadow-lg">Get Started</a>
      <a href="#" class="inline-block border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-[#0B2F5E] transition-colors">Learn More</a>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'hero-white',
        label: 'Hero (White)',
        category: 'Sections',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#F9FAFB" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="30" y="16" text-anchor="middle" fill="#0B2F5E" font-size="6" font-weight="bold">HEADING</text><rect x="10" y="21" width="40" height="3" fill="#9CA3AF" rx="1.5"/><rect x="20" y="27" width="20" height="5" fill="#0B2F5E" rx="2.5"/></svg>`,
        content: `
<section class="bg-white py-20">
  <div class="max-w-5xl mx-auto px-6 text-center">
    <p class="text-sm font-semibold uppercase tracking-widest text-yellow-500 mb-4">Tagline or category</p>
    <h1 class="text-5xl font-extrabold text-[#0B2F5E] leading-tight mb-6">Your Main Heading Here</h1>
    <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">A compelling subheading that supports your main message and drives visitors to take action.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#" class="inline-block bg-[#0B2F5E] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#0a2550] transition-colors shadow-md">Get Started</a>
      <a href="#" class="inline-block border-2 border-gray-300 text-gray-700 font-semibold px-8 py-3 rounded-lg hover:border-[#0B2F5E] hover:text-[#0B2F5E] transition-colors">Learn More</a>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'cta-banner',
        label: 'CTA Banner',
        category: 'Sections',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#1E3A5F" rx="3"/><text x="30" y="18" text-anchor="middle" fill="white" font-size="5" font-weight="bold">Call to Action</text><rect x="18" y="23" width="24" height="5" fill="#FBBF24" rx="2.5"/></svg>`,
        content: `
<section class="bg-[#0B2F5E] py-16">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-white mb-4">Ready to get started?</h2>
    <p class="text-xl text-blue-200 mb-10 max-w-2xl mx-auto">Join thousands of supply chain professionals who have advanced their careers with AAPSCM certification.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#" class="inline-block bg-yellow-400 text-gray-900 font-bold px-10 py-4 rounded-lg hover:bg-yellow-300 transition-colors text-lg shadow-lg">Register Now</a>
      <a href="#" class="inline-block border-2 border-white text-white font-semibold px-10 py-4 rounded-lg hover:bg-white hover:text-[#0B2F5E] transition-colors text-lg">Contact Us</a>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'section-gray',
        label: 'Section (Gray bg)',
        category: 'Sections',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#F3F4F6" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="8" width="50" height="24" fill="#E5E7EB" rx="2"/></svg>`,
        content: `
<section class="bg-gray-50 py-16">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Section Heading</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-lg">Add a short description to explain what this section is about and what visitors will find here.</p>
    </div>
    <p class="text-gray-700 leading-relaxed text-center">Double-click to edit any text. Drag blocks from the left panel to add more content.</p>
  </div>
</section>`.trim(),
    },

    {
        id: 'section-white',
        label: 'Section (White bg)',
        category: 'Sections',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="8" width="50" height="3" fill="#0B2F5E" rx="1.5"/><rect x="5" y="15" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="20" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="25" width="35" height="2" fill="#D1D5DB" rx="1"/></svg>`,
        content: `
<section class="bg-white py-16">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-[#0B2F5E] mb-6">Section Heading</h2>
    <p class="text-gray-700 leading-relaxed text-lg mb-4">Add your content here. This is a standard text section with a heading. Click on any text element to edit it inline, or use the Style Manager on the right to adjust styling.</p>
    <p class="text-gray-700 leading-relaxed text-lg">You can add more paragraphs, lists, or other content by <strong>double-clicking</strong> on this text area. Drag new blocks from the left panel to add different types of content below.</p>
  </div>
</section>`.trim(),
    },

    // ── LAYOUT ───────────────────────────────────────────────────────────────

    {
        id: 'two-columns',
        label: '2 Columns',
        category: 'Layout',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="4" y="8" width="24" height="24" fill="#EFF6FF" rx="2"/><rect x="32" y="8" width="24" height="24" fill="#EFF6FF" rx="2"/></svg>`,
        content: `
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div>
        <h3 class="text-2xl font-bold text-[#0B2F5E] mb-4">Left Column Heading</h3>
        <p class="text-gray-700 leading-relaxed mb-4">This is the left column content. Click to edit this text and replace it with your own content. You can add headings, paragraphs, lists, and more.</p>
        <ul class="space-y-2 text-gray-700">
          <li class="flex items-start gap-3"><span class="text-yellow-500 font-bold mt-0.5">✓</span><span>First benefit or feature point</span></li>
          <li class="flex items-start gap-3"><span class="text-yellow-500 font-bold mt-0.5">✓</span><span>Second benefit or feature point</span></li>
          <li class="flex items-start gap-3"><span class="text-yellow-500 font-bold mt-0.5">✓</span><span>Third benefit or feature point</span></li>
        </ul>
      </div>
      <div>
        <h3 class="text-2xl font-bold text-[#0B2F5E] mb-4">Right Column Heading</h3>
        <p class="text-gray-700 leading-relaxed mb-4">This is the right column content. You can have two completely different blocks of text side by side, each independently editable.</p>
        <p class="text-gray-700 leading-relaxed">Add more paragraphs or replace this with an image block by deleting this text column and dragging an Image block from the left panel.</p>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'three-columns',
        label: '3 Columns',
        category: 'Layout',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="4" y="8" width="15" height="24" fill="#EFF6FF" rx="2"/><rect x="22" y="8" width="15" height="24" fill="#EFF6FF" rx="2"/><rect x="40" y="8" width="15" height="24" fill="#EFF6FF" rx="2"/></svg>`,
        content: `
<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Three Column Section</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="w-16 h-16 bg-[#0B2F5E] rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">First Column</h3>
        <p class="text-gray-600 leading-relaxed">Description for the first feature or benefit. Click to edit this text.</p>
      </div>
      <div class="text-center">
        <div class="w-16 h-16 bg-[#0B2F5E] rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Second Column</h3>
        <p class="text-gray-600 leading-relaxed">Description for the second feature or benefit. Click to edit this text.</p>
      </div>
      <div class="text-center">
        <div class="w-16 h-16 bg-[#0B2F5E] rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Third Column</h3>
        <p class="text-gray-600 leading-relaxed">Description for the third feature or benefit. Click to edit this text.</p>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'text-image-right',
        label: 'Text + Image (right)',
        category: 'Layout',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="4" y="6" width="30" height="28" fill="#EFF6FF" rx="2"/><rect x="38" y="6" width="18" height="28" fill="#DBEAFE" rx="2"/></svg>`,
        content: `
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <p class="text-sm font-semibold uppercase tracking-widest text-yellow-500 mb-3">Category Label</p>
        <h2 class="text-4xl font-bold text-[#0B2F5E] mb-6 leading-tight">Heading for this text + image section</h2>
        <p class="text-gray-700 leading-relaxed mb-4">This is the main body text for this section. Click anywhere to edit it. You can write as much or as little as you need here.</p>
        <p class="text-gray-700 leading-relaxed mb-8">Add a second paragraph with more details. Use the formatting toolbar that appears when you select text to add bold, links, or other formatting.</p>
        <a href="#" class="inline-block bg-[#0B2F5E] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#0a2550] transition-colors">Learn More →</a>
      </div>
      <div>
        <img src="https://placehold.co/600x450/0B2F5E/white?text=Your+Image+Here" alt="Section image" class="w-full rounded-xl shadow-lg object-cover">
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'text-image-left',
        label: 'Text + Image (left)',
        category: 'Layout',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="4" y="6" width="18" height="28" fill="#DBEAFE" rx="2"/><rect x="26" y="6" width="30" height="28" fill="#EFF6FF" rx="2"/></svg>`,
        content: `
<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <img src="https://placehold.co/600x450/0B2F5E/white?text=Your+Image+Here" alt="Section image" class="w-full rounded-xl shadow-lg object-cover">
      </div>
      <div>
        <p class="text-sm font-semibold uppercase tracking-widest text-yellow-500 mb-3">Category Label</p>
        <h2 class="text-4xl font-bold text-[#0B2F5E] mb-6 leading-tight">Heading for this text + image section</h2>
        <p class="text-gray-700 leading-relaxed mb-4">This is the main body text for this section. The image is on the left, text on the right. Click anywhere to edit.</p>
        <p class="text-gray-700 leading-relaxed mb-8">Add more details in this second paragraph. Use formatting tools to make key points <strong>bold</strong> or add links.</p>
        <a href="#" class="inline-block bg-[#0B2F5E] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#0a2550] transition-colors">Learn More →</a>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    // ── CONTENT ──────────────────────────────────────────────────────────────

    {
        id: 'cards-3',
        label: 'Cards (3-col)',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#F9FAFB" rx="3"/><rect x="3" y="10" width="16" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/><rect x="22" y="10" width="16" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/><rect x="41" y="10" width="16" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/></svg>`,
        content: `
<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Our Key Services</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Brief description of what these cards represent.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-7 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mb-5">
          <svg class="w-6 h-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Card Title One</h3>
        <p class="text-gray-600 leading-relaxed mb-5">Description for this card. Explain the key value or feature in 2-3 sentences. Click to edit.</p>
        <a href="#" class="text-[#0B2F5E] font-semibold text-sm hover:text-yellow-600 transition-colors">Learn more →</a>
      </div>
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-7 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mb-5">
          <svg class="w-6 h-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Card Title Two</h3>
        <p class="text-gray-600 leading-relaxed mb-5">Description for this card. Explain the key value or feature in 2-3 sentences. Click to edit.</p>
        <a href="#" class="text-[#0B2F5E] font-semibold text-sm hover:text-yellow-600 transition-colors">Learn more →</a>
      </div>
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-7 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mb-5">
          <svg class="w-6 h-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Card Title Three</h3>
        <p class="text-gray-600 leading-relaxed mb-5">Description for this card. Explain the key value or feature in 2-3 sentences. Click to edit.</p>
        <a href="#" class="text-[#0B2F5E] font-semibold text-sm hover:text-yellow-600 transition-colors">Learn more →</a>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'cards-4',
        label: 'Cards (4-col)',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#F9FAFB" rx="3"/><rect x="2" y="10" width="12" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/><rect x="16" y="10" width="12" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/><rect x="30" y="10" width="12" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/><rect x="44" y="10" width="12" height="20" fill="white" rx="2" stroke="#E5E7EB" stroke-width="0.5"/></svg>`,
        content: `
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Why Choose Us</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-gray-50 rounded-xl p-6 text-center hover:bg-blue-50 transition-colors">
        <div class="text-4xl font-extrabold text-[#0B2F5E] mb-2">500+</div>
        <p class="text-gray-600 font-medium">Certified Professionals</p>
      </div>
      <div class="bg-gray-50 rounded-xl p-6 text-center hover:bg-blue-50 transition-colors">
        <div class="text-4xl font-extrabold text-[#0B2F5E] mb-2">60+</div>
        <p class="text-gray-600 font-medium">Certifications Offered</p>
      </div>
      <div class="bg-gray-50 rounded-xl p-6 text-center hover:bg-blue-50 transition-colors">
        <div class="text-4xl font-extrabold text-[#0B2F5E] mb-2">20+</div>
        <p class="text-gray-600 font-medium">Years of Experience</p>
      </div>
      <div class="bg-gray-50 rounded-xl p-6 text-center hover:bg-blue-50 transition-colors">
        <div class="text-4xl font-extrabold text-[#0B2F5E] mb-2">40+</div>
        <p class="text-gray-600 font-medium">Countries Reached</p>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'faq-accordion',
        label: 'FAQ Accordion',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="7" width="50" height="7" fill="#EFF6FF" rx="2"/><rect x="5" y="17" width="50" height="7" fill="#EFF6FF" rx="2"/><rect x="5" y="27" width="50" height="7" fill="#EFF6FF" rx="2"/></svg>`,
        content: `
<section class="py-16 bg-white">
  <div class="max-w-3xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Frequently Asked Questions</h2>
      <p class="text-gray-600">Find answers to the most common questions below.</p>
    </div>
    <div class="space-y-3">
      <details class="group border border-gray-200 rounded-xl overflow-hidden" open="">
        <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none bg-white hover:bg-gray-50">
          <span class="font-semibold text-gray-900">Question one: What is AAPSCM certification?</span>
          <svg class="w-5 h-5 text-[#0B2F5E] flex-shrink-0 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </summary>
        <div class="px-6 py-5 bg-gray-50 border-t border-gray-200">
          <p class="text-gray-700 leading-relaxed">This is the answer to question one. Click this text to edit it and add your actual FAQ answer. You can write multiple paragraphs, add links, or include any relevant details.</p>
        </div>
      </details>
      <details class="group border border-gray-200 rounded-xl overflow-hidden">
        <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none bg-white hover:bg-gray-50">
          <span class="font-semibold text-gray-900">Question two: How do I register for a certification?</span>
          <svg class="w-5 h-5 text-[#0B2F5E] flex-shrink-0 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </summary>
        <div class="px-6 py-5 bg-gray-50 border-t border-gray-200">
          <p class="text-gray-700 leading-relaxed">This is the answer to question two. Replace this placeholder text with your actual answer content.</p>
        </div>
      </details>
      <details class="group border border-gray-200 rounded-xl overflow-hidden">
        <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none bg-white hover:bg-gray-50">
          <span class="font-semibold text-gray-900">Question three: What are the membership benefits?</span>
          <svg class="w-5 h-5 text-[#0B2F5E] flex-shrink-0 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </summary>
        <div class="px-6 py-5 bg-gray-50 border-t border-gray-200">
          <p class="text-gray-700 leading-relaxed">This is the answer to question three. Replace this placeholder text with your actual answer content.</p>
        </div>
      </details>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'team-grid',
        label: 'Team Members',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#F9FAFB" rx="3"/><circle cx="15" cy="15" r="6" fill="#0B2F5E"/><circle cx="30" cy="15" r="6" fill="#0B2F5E"/><circle cx="45" cy="15" r="6" fill="#0B2F5E"/><rect x="8" y="25" width="14" height="3" fill="#D1D5DB" rx="1.5"/><rect x="23" y="25" width="14" height="3" fill="#D1D5DB" rx="1.5"/><rect x="38" y="25" width="14" height="3" fill="#D1D5DB" rx="1.5"/></svg>`,
        content: `
<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Our Leadership Team</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Meet the experienced professionals driving AAPSCM's mission forward.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 text-center p-6">
        <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Team Member" class="w-28 h-28 rounded-full mx-auto mb-4 object-cover">
        <h3 class="text-xl font-bold text-gray-900 mb-1">Full Name</h3>
        <p class="text-[#0B2F5E] font-medium text-sm mb-3">Job Title / Position</p>
        <p class="text-gray-600 text-sm leading-relaxed">Brief bio or description of this team member's background and expertise.</p>
      </div>
      <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 text-center p-6">
        <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Team Member" class="w-28 h-28 rounded-full mx-auto mb-4 object-cover">
        <h3 class="text-xl font-bold text-gray-900 mb-1">Full Name</h3>
        <p class="text-[#0B2F5E] font-medium text-sm mb-3">Job Title / Position</p>
        <p class="text-gray-600 text-sm leading-relaxed">Brief bio or description of this team member's background and expertise.</p>
      </div>
      <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 text-center p-6">
        <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Team Member" class="w-28 h-28 rounded-full mx-auto mb-4 object-cover">
        <h3 class="text-xl font-bold text-gray-900 mb-1">Full Name</h3>
        <p class="text-[#0B2F5E] font-medium text-sm mb-3">Job Title / Position</p>
        <p class="text-gray-600 text-sm leading-relaxed">Brief bio or description of this team member's background and expertise.</p>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'person-profile',
        label: 'Person Profile',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><circle cx="14" cy="16" r="8" fill="#0B2F5E"/><rect x="4" y="27" width="20" height="2.5" fill="#1F2937" rx="1"/><rect x="4" y="32" width="20" height="2" fill="#0D9488" rx="1"/><rect x="28" y="10" width="28" height="2" fill="#D1D5DB" rx="1"/><rect x="28" y="15" width="28" height="2" fill="#D1D5DB" rx="1"/><rect x="28" y="20" width="28" height="2" fill="#D1D5DB" rx="1"/><rect x="28" y="25" width="20" height="2" fill="#D1D5DB" rx="1"/></svg>`,
        content: `
<section class="py-12 bg-white">
  <div class="max-w-5xl mx-auto px-6">
    <div class="flex flex-col sm:flex-row gap-8 items-start border border-gray-200 rounded-xl p-8 shadow-sm">
      <div class="sm:w-44 flex-shrink-0 text-center">
        <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Profile Photo" class="w-36 h-36 rounded-full mx-auto mb-4 object-cover border-4 border-gray-100 shadow-md">
        <h3 class="text-xl font-bold text-gray-900 mb-1">Full Name</h3>
        <p class="text-sm font-bold text-teal-600 leading-snug">Job Title &amp; Role Description</p>
      </div>
      <div class="flex-1">
        <p class="text-gray-700 leading-relaxed mb-4">First paragraph of the bio. Click to edit this text and add the person's background, expertise, and professional achievements. This section supports <strong>bold text</strong> and other inline formatting.</p>
        <p class="text-gray-700 leading-relaxed">Second paragraph. Continue the biography here with more details about their career trajectory, areas of expertise, and contributions to the field.</p>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'person-profiles-grid',
        label: 'Person Profiles (Grid)',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#F9FAFB" rx="3"/><circle cx="14" cy="12" r="5" fill="#0B2F5E"/><rect x="4" y="20" width="20" height="2" fill="#1F2937" rx="1"/><rect x="4" y="25" width="20" height="1.5" fill="#0D9488" rx="1"/><rect x="4" y="29" width="20" height="1.5" fill="#D1D5DB" rx="1"/><circle cx="45" cy="12" r="5" fill="#0B2F5E"/><rect x="35" y="20" width="20" height="2" fill="#1F2937" rx="1"/><rect x="35" y="25" width="20" height="1.5" fill="#0D9488" rx="1"/><rect x="35" y="29" width="20" height="1.5" fill="#D1D5DB" rx="1"/></svg>`,
        content: `
<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">Our Expert Trainers</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Experienced professionals delivering AAPSCM's world-class training programs.</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <div class="flex flex-col sm:flex-row gap-6 items-start bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <div class="sm:w-36 flex-shrink-0 text-center">
          <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Profile Photo" class="w-28 h-28 rounded-full mx-auto mb-3 object-cover border-4 border-gray-100 shadow">
          <h3 class="text-lg font-bold text-gray-900 mb-0.5">Full Name</h3>
          <p class="text-xs font-bold text-teal-600 leading-snug">Job Title &amp; Role</p>
        </div>
        <div class="flex-1">
          <p class="text-gray-700 text-sm leading-relaxed mb-3">Bio paragraph one. Summarise this person's background, credentials, and areas of expertise. Keep it concise for the grid layout.</p>
          <p class="text-gray-700 text-sm leading-relaxed">Bio paragraph two. Add further highlights about their career or contributions to the industry.</p>
        </div>
      </div>
      <div class="flex flex-col sm:flex-row gap-6 items-start bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <div class="sm:w-36 flex-shrink-0 text-center">
          <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Profile Photo" class="w-28 h-28 rounded-full mx-auto mb-3 object-cover border-4 border-gray-100 shadow">
          <h3 class="text-lg font-bold text-gray-900 mb-0.5">Full Name</h3>
          <p class="text-xs font-bold text-teal-600 leading-snug">Job Title &amp; Role</p>
        </div>
        <div class="flex-1">
          <p class="text-gray-700 text-sm leading-relaxed mb-3">Bio paragraph one. Summarise this person's background, credentials, and areas of expertise. Keep it concise for the grid layout.</p>
          <p class="text-gray-700 text-sm leading-relaxed">Bio paragraph two. Add further highlights about their career or contributions to the industry.</p>
        </div>
      </div>
      <div class="flex flex-col sm:flex-row gap-6 items-start bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <div class="sm:w-36 flex-shrink-0 text-center">
          <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Profile Photo" class="w-28 h-28 rounded-full mx-auto mb-3 object-cover border-4 border-gray-100 shadow">
          <h3 class="text-lg font-bold text-gray-900 mb-0.5">Full Name</h3>
          <p class="text-xs font-bold text-teal-600 leading-snug">Job Title &amp; Role</p>
        </div>
        <div class="flex-1">
          <p class="text-gray-700 text-sm leading-relaxed mb-3">Bio paragraph one. Summarise this person's background, credentials, and areas of expertise. Keep it concise for the grid layout.</p>
          <p class="text-gray-700 text-sm leading-relaxed">Bio paragraph two. Add further highlights about their career or contributions to the industry.</p>
        </div>
      </div>
      <div class="flex flex-col sm:flex-row gap-6 items-start bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
        <div class="sm:w-36 flex-shrink-0 text-center">
          <img src="https://placehold.co/200x200/0B2F5E/white?text=Photo" alt="Profile Photo" class="w-28 h-28 rounded-full mx-auto mb-3 object-cover border-4 border-gray-100 shadow">
          <h3 class="text-lg font-bold text-gray-900 mb-0.5">Full Name</h3>
          <p class="text-xs font-bold text-teal-600 leading-snug">Job Title &amp; Role</p>
        </div>
        <div class="flex-1">
          <p class="text-gray-700 text-sm leading-relaxed mb-3">Bio paragraph one. Summarise this person's background, credentials, and areas of expertise. Keep it concise for the grid layout.</p>
          <p class="text-gray-700 text-sm leading-relaxed">Bio paragraph two. Add further highlights about their career or contributions to the industry.</p>
        </div>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'text-block',
        label: 'Rich Text',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="7" width="40" height="4" fill="#0B2F5E" rx="2"/><rect x="5" y="15" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="20" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="25" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="30" width="35" height="2" fill="#D1D5DB" rx="1"/></svg>`,
        content: `
<section class="py-16 bg-white">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-[#0B2F5E] mb-6">Section Heading</h2>
    <p class="text-gray-700 leading-relaxed text-lg mb-4">This is a full-width rich text section. Click on any text element to edit it inline. Use the formatting toolbar to add <strong>bold text</strong>, <em>italic text</em>, or <a href="#" class="text-blue-700 underline">hyperlinks</a>.</p>
    <p class="text-gray-700 leading-relaxed mb-4">Add a second paragraph here. This block is useful for long-form content, descriptions, and body text pages.</p>
    <ul class="list-disc pl-6 space-y-2 text-gray-700 mb-4">
      <li>First list item — click to edit</li>
      <li>Second list item — click to edit</li>
      <li>Third list item — click to edit</li>
    </ul>
    <p class="text-gray-700 leading-relaxed">A closing paragraph. Replace all placeholder content with your actual page content.</p>
  </div>
</section>`.trim(),
    },

    {
        id: 'testimonial',
        label: 'Quote / Testimonial',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#EFF6FF" rx="3"/><text x="8" y="18" font-size="20" fill="#BFDBFE">"</text><rect x="15" y="12" width="35" height="2" fill="#93C5FD" rx="1"/><rect x="15" y="17" width="30" height="2" fill="#93C5FD" rx="1"/><rect x="15" y="22" width="25" height="2" fill="#93C5FD" rx="1"/><circle cx="20" cy="32" r="4" fill="#60A5FA"/></svg>`,
        content: `
<section class="py-16 bg-blue-50">
  <div class="max-w-4xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-md p-10 text-center">
      <svg class="w-12 h-12 text-yellow-400 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
      <blockquote class="text-2xl text-gray-800 font-medium leading-relaxed mb-8 italic">"This certification transformed my career. The knowledge and credibility it gave me opened doors I never thought possible in supply chain management."</blockquote>
      <div class="flex items-center justify-center gap-4">
        <img src="https://placehold.co/80x80/0B2F5E/white?text=JD" alt="Person" class="w-14 h-14 rounded-full object-cover">
        <div class="text-left">
          <p class="font-bold text-gray-900">Jane Doe</p>
          <p class="text-gray-600 text-sm">Supply Chain Director, Fortune 500 Company</p>
        </div>
      </div>
    </div>
  </div>
</section>`.trim(),
    },

    {
        id: 'image-full',
        label: 'Image (full-width)',
        category: 'Content',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="#DBEAFE" rx="3"/><rect x="3" y="6" width="54" height="28" fill="#93C5FD" rx="2"/><text x="30" y="23" text-anchor="middle" fill="white" font-size="5">IMAGE</text></svg>`,
        content: `
<section class="py-0">
  <img src="https://placehold.co/1200x500/0B2F5E/white?text=Full+Width+Image" alt="Full width image" class="w-full object-cover">
</section>`.trim(),
    },

    // ── TYPOGRAPHY ───────────────────────────────────────────────────────────

    {
        id: 'typography-title',
        label: 'Title',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="26" fill="#0B2F5E" font-size="16" font-weight="bold" font-family="serif">Title</text></svg>`,
        content: `<h1 class="text-5xl font-extrabold text-[#0B2F5E] leading-tight mb-4">Page Title</h1>`.trim(),
    },

    {
        id: 'typography-subtitle',
        label: 'Subtitle',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="24" fill="#374151" font-size="11" font-weight="600" font-family="sans-serif">Subtitle text</text></svg>`,
        content: `<p class="text-xl text-gray-500 font-medium leading-relaxed mb-4">Section subtitle — a short supporting sentence below the main title.</p>`.trim(),
    },

    {
        id: 'typography-h1',
        label: 'Heading 1',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="27" fill="#0B2F5E" font-size="18" font-weight="bold" font-family="sans-serif">H1</text></svg>`,
        content: `<h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-4">Heading 1</h1>`.trim(),
    },

    {
        id: 'typography-h2',
        label: 'Heading 2',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="27" fill="#0B2F5E" font-size="15" font-weight="bold" font-family="sans-serif">H2</text></svg>`,
        content: `<h2 class="text-4xl font-bold text-gray-900 leading-tight mb-4">Heading 2</h2>`.trim(),
    },

    {
        id: 'typography-h3',
        label: 'Heading 3',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="27" fill="#0B2F5E" font-size="13" font-weight="bold" font-family="sans-serif">H3</text></svg>`,
        content: `<h3 class="text-3xl font-bold text-gray-900 leading-snug mb-3">Heading 3</h3>`.trim(),
    },

    {
        id: 'typography-h4',
        label: 'Heading 4',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="27" fill="#0B2F5E" font-size="11" font-weight="bold" font-family="sans-serif">H4</text></svg>`,
        content: `<h4 class="text-2xl font-semibold text-gray-900 leading-snug mb-3">Heading 4</h4>`.trim(),
    },

    {
        id: 'typography-h5',
        label: 'Heading 5',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="27" fill="#0B2F5E" font-size="9" font-weight="bold" font-family="sans-serif">H5</text></svg>`,
        content: `<h5 class="text-xl font-semibold text-gray-800 leading-snug mb-2">Heading 5</h5>`.trim(),
    },

    {
        id: 'typography-h6',
        label: 'Heading 6',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><text x="5" y="27" fill="#6B7280" font-size="8" font-weight="bold" font-family="sans-serif">H6</text></svg>`,
        content: `<h6 class="text-base font-semibold text-gray-700 uppercase tracking-wider mb-2">Heading 6</h6>`.trim(),
    },

    {
        id: 'typography-paragraph',
        label: 'Paragraph',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="10" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="16" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="22" width="50" height="2" fill="#D1D5DB" rx="1"/><rect x="5" y="28" width="33" height="2" fill="#D1D5DB" rx="1"/></svg>`,
        content: `<p class="text-gray-700 leading-relaxed text-base mb-4">This is a paragraph. Click to edit this text and replace it with your own content. Use the formatting toolbar to add <strong>bold</strong>, <em>italic</em>, or <a href="#" class="text-blue-700 underline">links</a>.</p>`.trim(),
    },

    {
        id: 'typography-lead',
        label: 'Lead Paragraph',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="9" width="50" height="3" fill="#9CA3AF" rx="1.5"/><rect x="5" y="16" width="50" height="3" fill="#9CA3AF" rx="1.5"/><rect x="5" y="23" width="33" height="3" fill="#9CA3AF" rx="1.5"/></svg>`,
        content: `<p class="text-xl text-gray-600 leading-relaxed mb-6">This is a lead paragraph — larger than body text. Use it for introductory copy or pull-quotes within an article.</p>`.trim(),
    },

    {
        id: 'typography-label',
        label: 'Label / Eyebrow',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="17" width="35" height="6" fill="#FEF08A" rx="1"/><text x="7" y="23" fill="#92400E" font-size="5" font-weight="bold" font-family="sans-serif">EYEBROW</text></svg>`,
        content: `<p class="text-sm font-bold uppercase tracking-widest text-yellow-600 mb-3">Category Label</p>`.trim(),
    },

    {
        id: 'typography-blockquote',
        label: 'Blockquote',
        category: 'Typography',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><rect x="5" y="8" width="3" height="24" fill="#0B2F5E" rx="1.5"/><rect x="12" y="12" width="42" height="2" fill="#D1D5DB" rx="1"/><rect x="12" y="18" width="38" height="2" fill="#D1D5DB" rx="1"/><rect x="12" y="24" width="30" height="2" fill="#D1D5DB" rx="1"/></svg>`,
        content: `<blockquote class="border-l-4 border-[#0B2F5E] pl-6 py-2 my-4"><p class="text-xl text-gray-700 italic leading-relaxed">"This is a blockquote. Replace this text with a meaningful quote, excerpt, or highlighted statement from your content."</p><cite class="block mt-3 text-sm text-gray-500 not-italic">— Source Name</cite></blockquote>`.trim(),
    },

    // ── UTILITIES ────────────────────────────────────────────────────────────

    {
        id: 'divider',
        label: 'Divider',
        category: 'Utilities',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1"/><line x1="5" y1="20" x2="55" y2="20" stroke="#D1D5DB" stroke-width="2"/></svg>`,
        content: `<div class="py-4"><hr class="border-gray-200"></div>`.trim(),
    },

    {
        id: 'spacer',
        label: 'Spacer',
        category: 'Utilities',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3" stroke="#E5E7EB" stroke-width="1" stroke-dasharray="4 2"/></svg>`,
        content: `<div class="py-12" data-gjs-type="spacer"></div>`.trim(),
    },

    {
        id: 'button',
        label: 'Button',
        category: 'Utilities',
        media: `<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="40" fill="white" rx="3"/><rect x="10" y="12" width="40" height="16" fill="#0B2F5E" rx="8"/><text x="30" y="23" text-anchor="middle" fill="white" font-size="5" font-weight="bold">BUTTON</text></svg>`,
        content: `<div class="py-4 text-center"><a href="#" class="inline-block bg-[#0B2F5E] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#0a2550] transition-colors shadow-md">Button Label</a></div>`.trim(),
    },

];

// ─────────────────────────────────────────────────────────────────────────────
// Initialize GrapesJS
// ─────────────────────────────────────────────────────────────────────────────
const editor = grapesjs.init({
    container: '#gjs',
    fromElement: false,
    height: '100%',
    width: 'auto',

    storageManager: false,

    // Injected as a <style> tag directly in the canvas iframe — always applied.
    // Overrides Tailwind preflight's heading reset (font-size/weight: inherit)
    // so typography blocks look correct. Tailwind utility classes (.text-5xl,
    // .font-extrabold, etc.) have higher specificity and still win over these.
    protectedCss: [
        'body { font-family: Figtree, ui-sans-serif, system-ui, sans-serif; font-size: 1rem; color: #374151; }',
        'h1 { font-size: 2.25rem; font-weight: 800; line-height: 1.2; margin: 0 0 1rem; }',
        'h2 { font-size: 1.875rem; font-weight: 700; line-height: 1.25; margin: 0 0 0.875rem; }',
        'h3 { font-size: 1.5rem;   font-weight: 700; line-height: 1.3;  margin: 0 0 0.75rem; }',
        'h4 { font-size: 1.25rem;  font-weight: 600; line-height: 1.375; margin: 0 0 0.625rem; }',
        'h5 { font-size: 1.125rem; font-weight: 600; line-height: 1.4;  margin: 0 0 0.5rem; }',
        'h6 { font-size: 1rem;     font-weight: 600; line-height: 1.5;  margin: 0 0 0.5rem; }',
        'p  { text-align: justify; text-justify: inter-word; margin: 0 0 1rem; }',
        // Keep common inline formatting elements truly inline inside paragraphs.
        // GrapesJS can assign inline-block to these as child components, which
        // breaks the parent paragraph\'s justify (inline-block creates its own
        // independent formatting context).
        'p strong, p b, p em, p i, p u, p s, p span, p a, p mark, p abbr, p cite, p code { display: inline; text-align: inherit; }',
        'a  { color: #0B2F5E; text-decoration: underline; }',
        '*  { box-sizing: border-box; }',
        '[data-gjs-type="wrapper"] { min-height: 100vh; }',
    ].join('\n'),

    canvas: {
        styles: [cfg.appCssUrl],
        scripts: [],
    },

    blockManager: {
        appendTo: '#blocks-panel',
        blocks: BLOCKS,
    },

    layerManager: {
        appendTo: '#layers-panel',
    },

    styleManager: {
        appendTo: '#style-panel',
        sectors: [
            {
                name: 'Dimension',
                open: false,
                properties: [
                    { name: 'Width', property: 'width' },
                    { name: 'Min Width', property: 'min-width' },
                    { name: 'Max Width', property: 'max-width' },
                    { name: 'Height', property: 'height' },
                ],
            },
            {
                name: 'Spacing',
                open: true,
                properties: [
                    {
                        name: 'Padding',
                        property: 'padding',
                        type: 'composite',
                        properties: [
                            { name: 'Top',    property: 'padding-top',    type: 'integer', units: ['px', 'em', 'rem', '%'], unit: 'px' },
                            { name: 'Right',  property: 'padding-right',  type: 'integer', units: ['px', 'em', 'rem', '%'], unit: 'px' },
                            { name: 'Bottom', property: 'padding-bottom', type: 'integer', units: ['px', 'em', 'rem', '%'], unit: 'px' },
                            { name: 'Left',   property: 'padding-left',   type: 'integer', units: ['px', 'em', 'rem', '%'], unit: 'px' },
                        ],
                    },
                    {
                        name: 'Margin',
                        property: 'margin',
                        type: 'composite',
                        properties: [
                            { name: 'Top',    property: 'margin-top',    type: 'integer', units: ['px', 'em', 'rem', '%', 'auto'], unit: 'px' },
                            { name: 'Right',  property: 'margin-right',  type: 'integer', units: ['px', 'em', 'rem', '%', 'auto'], unit: 'px' },
                            { name: 'Bottom', property: 'margin-bottom', type: 'integer', units: ['px', 'em', 'rem', '%', 'auto'], unit: 'px' },
                            { name: 'Left',   property: 'margin-left',   type: 'integer', units: ['px', 'em', 'rem', '%', 'auto'], unit: 'px' },
                        ],
                    },
                ],
            },
            {
                name: 'Typography',
                open: false,
                properties: [
                    { name: 'Font Size', property: 'font-size' },
                    { name: 'Font Weight', property: 'font-weight' },
                    { name: 'Color', property: 'color', type: 'color' },
                    { name: 'Text Align', property: 'text-align', type: 'radio', list: [{ value: 'left', title: 'Left' }, { value: 'center', title: 'Center' }, { value: 'right', title: 'Right' }, { value: 'justify', title: 'Justify' }] },
                ],
            },
            {
                name: 'Background',
                open: false,
                properties: [
                    { name: 'Background Color', property: 'background-color', type: 'color' },
                    { name: 'Background Image', property: 'background-image' },
                ],
            },
        ],
    },

    deviceManager: {
        devices: [
            { id: 'desktop', name: 'Desktop', width: '' },
            { id: 'tablet', name: 'Tablet', width: '768px', widthMedia: '768px' },
            { id: 'mobile', name: 'Mobile', width: '390px', widthMedia: '390px' },
        ],
    },

    // Remove default nav panels — we build our own
    panels: { defaults: [] },

    // Keep only essential commands
    commands: {
        defaults: [
            {
                id: 'set-device-desktop',
                run: (e) => e.setDevice('desktop'),
            },
            {
                id: 'set-device-tablet',
                run: (e) => e.setDevice('tablet'),
            },
            {
                id: 'set-device-mobile',
                run: (e) => e.setDevice('mobile'),
            },
        ],
    },
});

// ─────────────────────────────────────────────────────────────────────────────
// Load existing content
// ─────────────────────────────────────────────────────────────────────────────
if (cfg.gjsData && Object.keys(cfg.gjsData).length > 0) {
    // Re-edit a previously saved GrapesJS project
    editor.loadProjectData(cfg.gjsData);
} else if (cfg.pageContent && cfg.pageContent.trim()) {
    // Load existing HTML (Elementor or any other source)
    editor.setComponents(cfg.pageContent);
}

// ─────────────────────────────────────────────────────────────────────────────
// UI helpers
// ─────────────────────────────────────────────────────────────────────────────

// Attach trait manager to traits-container
editor.TraitManager.render();
const traitEl = editor.TraitManager.el;
if (traitEl) {
    document.getElementById('traits-container')?.appendChild(traitEl);
}

// Tab switching — each sidebar is independent (left and right)
// Left sidebar: blocks / layers
const leftTabs   = document.querySelectorAll('[data-panel-tab="blocks"], [data-panel-tab="layers"]');
const rightTabs  = document.querySelectorAll('[data-panel-tab="styles"], [data-panel-tab="traits"]');

function activateTab(tabs, clickedTab) {
    const target = clickedTab.dataset.panelTab;
    tabs.forEach((t) => {
        const isActive = t === clickedTab;
        t.classList.toggle('active-tab', isActive);
        t.classList.toggle('text-gray-400', !isActive);
        t.classList.toggle('hover:text-white', !isActive);
    });
    // Show matching panel, hide others in the same group
    document.querySelectorAll('[data-panel]').forEach((panel) => {
        if (panel.dataset.panel === target) {
            panel.classList.remove('hidden');
        } else {
            // Only hide panels managed by this tab group
            const siblingTargets = Array.from(tabs).map((t) => t.dataset.panelTab);
            if (siblingTargets.includes(panel.dataset.panel)) {
                panel.classList.add('hidden');
            }
        }
    });
}

leftTabs.forEach((tab) => tab.addEventListener('click', () => activateTab(leftTabs, tab)));
rightTabs.forEach((tab) => tab.addEventListener('click', () => activateTab(rightTabs, tab)));

// Device switcher buttons
document.querySelectorAll('[data-device]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const device = btn.dataset.device;
        editor.setDevice(device);

        document.querySelectorAll('[data-device]').forEach((b) => {
            b.classList.toggle('bg-white', b === btn);
            b.classList.toggle('text-gray-900', b === btn);
            b.classList.toggle('text-gray-400', b !== btn);
        });
    });
});

// Undo / Redo
document.getElementById('btn-undo')?.addEventListener('click', () => editor.UndoManager.undo());
document.getElementById('btn-redo')?.addEventListener('click', () => editor.UndoManager.redo());
document.addEventListener('keydown', (e) => {
    if (e.ctrlKey && e.key === 'z' && !e.shiftKey) { editor.UndoManager.undo(); }
    if (e.ctrlKey && e.key === 'y') { editor.UndoManager.redo(); }
    if (e.ctrlKey && e.shiftKey && e.key === 'Z') { editor.UndoManager.redo(); }
});

// ─────────────────────────────────────────────────────────────────────────────
// Save
// ─────────────────────────────────────────────────────────────────────────────
async function savePage() {
    const btnSave     = document.getElementById('btn-save');
    const saveStatus  = document.getElementById('save-status');
    const previewLink = document.getElementById('btn-preview');

    btnSave.disabled  = true;
    btnSave.textContent = 'Saving…';

    try {
        const html    = editor.getHtml();
        const css     = editor.getCss();   // style-manager rules, colour overrides, etc.
        const gjsData = editor.getProjectData();

        const resp = await fetch(cfg.savePath, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': cfg.csrfToken,
            },
            body: JSON.stringify({ html, css, gjs_data: gjsData }),
        });

        if (!resp.ok) {
            throw new Error(`HTTP ${resp.status}`);
        }

        const data = await resp.json();

        if (data.success) {
            saveStatus.textContent = '✓ Saved';
            saveStatus.className   = 'text-sm text-green-400';
            if (previewLink && data.preview) {
                previewLink.href = data.preview;
            }
            setTimeout(() => { saveStatus.textContent = ''; }, 3000);
        }
    } catch (err) {
        saveStatus.textContent = '✗ Save failed';
        saveStatus.className   = 'text-sm text-red-400';
        console.error('Save error:', err);
    } finally {
        btnSave.disabled    = false;
        btnSave.textContent = 'Save';
    }
}

document.getElementById('btn-save')?.addEventListener('click', savePage);

// Auto-save on Ctrl+S
document.addEventListener('keydown', (e) => {
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        savePage();
    }
});
