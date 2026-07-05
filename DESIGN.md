---
name: Telkom Digital Governance
colors:
  surface: '#fff8f7'
  surface-dim: '#f4d2cf'
  surface-bright: '#fff8f7'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#fff0ee'
  surface-container: '#ffe9e6'
  surface-container-high: '#ffe2de'
  surface-container-highest: '#fddbd7'
  on-surface: '#291715'
  on-surface-variant: '#5d3f3c'
  inverse-surface: '#402b29'
  inverse-on-surface: '#ffedea'
  outline: '#926f6b'
  outline-variant: '#e7bdb8'
  surface-tint: '#c00014'
  primary: '#ba0013'
  on-primary: '#ffffff'
  primary-container: '#e31e24'
  on-primary-container: '#fffafa'
  inverse-primary: '#ffb4ab'
  secondary: '#575e70'
  on-secondary: '#ffffff'
  secondary-container: '#d9dff5'
  on-secondary-container: '#5c6274'
  tertiary: '#006190'
  on-tertiary: '#ffffff'
  tertiary-container: '#007bb5'
  on-tertiary-container: '#fbfcff'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffdad6'
  primary-fixed-dim: '#ffb4ab'
  on-primary-fixed: '#410002'
  on-primary-fixed-variant: '#93000d'
  secondary-fixed: '#dce2f7'
  secondary-fixed-dim: '#c0c6db'
  on-secondary-fixed: '#141b2b'
  on-secondary-fixed-variant: '#404758'
  tertiary-fixed: '#cbe6ff'
  tertiary-fixed-dim: '#8ecdff'
  on-tertiary-fixed: '#001e30'
  on-tertiary-fixed-variant: '#004b71'
  background: '#fff8f7'
  on-background: '#291715'
  surface-variant: '#fddbd7'
typography:
  display-lg:
    fontFamily: Inter
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Inter
    fontSize: 36px
    fontWeight: '700'
    lineHeight: 44px
    letterSpacing: -0.02em
  headline-sm:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
    letterSpacing: -0.01em
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
    letterSpacing: 0em
  body-sm:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
    letterSpacing: 0em
  label-caps:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.05em
  code:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '500'
    lineHeight: 20px
    letterSpacing: -0.01em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 4px
  xs: 4px
  sm: 8px
  md: 16px
  lg: 24px
  xl: 40px
  gutter: 24px
  container-max: 1280px
---

## Brand & Style

The brand identity centers on the digital transformation of PT Telkom Indonesia, moving from a traditional telecommunications giant to a lean, tech-first enterprise. The design system adopts a **Minimalist Corporate** style, drawing heavy inspiration from high-performance developer tools like Linear and Vercel. 

The aesthetic is characterized by expansive whitespace, a focus on high-density information clarity, and a "utility-first" visual language. It evokes an emotional response of precision, reliability, and modern efficiency. The UI avoids unnecessary ornamentation, favoring structural integrity and typographic hierarchy to guide the user through complex enterprise workflows.

## Colors

The palette is anchored by **Telkom Red (#E31E24)**, used purposefully as an action color rather than a dominant decorative element. This ensures the brand is present but does not cause visual fatigue in long-session enterprise applications.

- **Primary:** Reserved for primary actions, progress indicators, and critical states.
- **Neutral/Surface:** A sophisticated range of grays inspired by aluminum and glass. Surfaces use `#F9FAFB` to create subtle contrast against the `#FFFFFF` base.
- **Typography:** Deep Slate (`#111827`) provides maximum legibility, while muted grays are used for secondary metadata and placeholders.

## Typography

This design system utilizes **Inter** exclusively to achieve a systematic, utilitarian aesthetic. The type scale is "crisp," meaning it favors slightly smaller body text (14px/16px) with generous line heights to enhance readability in data-heavy environments.

Headlines should utilize tighter letter-spacing (-0.01em to -0.02em) to maintain a modern, "tucked" look. Labels for metadata or overlines should be set in uppercase with increased tracking to differentiate them from interactive body text.

## Layout & Spacing

The layout philosophy follows a **strict 4px grid system** to ensure mathematical harmony between elements. 

- **Desktop:** 12-column fluid grid with 24px gutters. Page margins are set to 40px to provide breathing room.
- **Tablet:** 8-column grid with 16px gutters and margins.
- **Mobile:** 4-column grid with 16px gutters and margins. 

Components should use internal padding following the `md` (16px) or `sm` (8px) tokens to maintain a compact, "SaaS-like" density. Sections are separated by `xl` (40px) vertical spacing to clearly demarcate the content hierarchy.

## Elevation & Depth

In alignment with the minimalist aesthetic, depth is achieved through **low-contrast outlines** and **ambient shadows**. 

- **Level 0 (Base):** White background.
- **Level 1 (Cards/Inputs):** Background color `#FFFFFF` with a 1px border of `#E5E7EB`.
- **Level 2 (Hover/Active):** A soft, diffused shadow: `0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05)`.
- **Level 3 (Modals/Popovers):** Elevated with a more pronounced but still neutral shadow: `0 20px 25px -5px rgb(0 0 0 / 0.1)`.

Avoid heavy gradients. Use subtle background blurs (10px - 20px) only for fixed navigation bars to suggest transparency and technical sophistication.

## Shapes

The design system uses a "Rounded" geometry to soften the corporate edge while remaining professional. 

- **Standard Buttons/Inputs:** 0.5rem (8px) for a modern, balanced look.
- **Containers/Cards:** 0.75rem (12px) to 1rem (16px) depending on size, creating a clear nesting logic where outer containers are more rounded than inner elements.
- **Data Tags/Status Badges:** Completely rounded (Pill) to distinguish them from interactive buttons.

## Components

The component library follows the **shadcn/ui** aesthetic: functional, high-contrast, and keyboard-accessible.

- **Buttons:** Primary buttons use Telkom Red with white text. Secondary buttons use a white background with a gray-200 border and slate-900 text. Use subtle `transition-colors` on hover.
- **Input Fields:** 1px solid borders (`#E5E7EB`). On focus, the border shifts to `#111827` or a soft red glow with a 2px offset.
- **Cards:** Minimal padding (24px), white background, and a 1px light gray border. No shadow by default; shadow appears only on hover or when floating.
- **Lists:** High-density rows (48px height) with subtle bottom borders. Use a light gray background (`#F9FAFB`) for alternating rows or hover states.
- **Chips/Badges:** Small font size (12px), semibold, with low-saturation background tints (e.g., a very light red background for "Critical" status) to keep the UI clean.
- **Sidebar:** Dark Slate (`#111827`) or very light gray (`#F9FAFB`) with vertical navigation links using 14px Inter Medium.

# Implementation Rules

This document is the single source of truth for the frontend implementation.

Every Blade view, Blade component, layout, page, and reusable UI component must strictly follow this design system.

If there is any conflict between the current implementation and this document, DESIGN.md always takes precedence.

Do not invent new visual styles.

Maintain consistency across the entire application.

---

# Scope

This design system applies to every frontend file, including but not limited to:

resources/views/layouts/*
resources/views/components/*
resources/views/auth/*
resources/views/dashboard/*
resources/views/departments/*
resources/views/categories/*
resources/views/products/*
resources/views/borrowings/*
resources/views/reports/*
resources/views/profile/*

---

# General UI Rules

The application is an internal enterprise system.

The interface should feel:

- Professional
- Modern
- Minimalist
- Enterprise
- Efficient
- Trustworthy

Avoid marketing-style UI.

Avoid excessive decoration.

Whitespace is part of the design.

Do not overuse the primary color.

Use Telkom Red only as an accent color.

---

# Layout Rules

Desktop

- Sidebar Width: 280px
- Navbar Height: 72px
- Max Content Width: 1280px
- Page Padding: 40px
- Grid Gap: 24px
- Section Gap: 40px

Tablet

- Responsive sidebar
- 8-column layout

Mobile

- Collapsible sidebar
- 4-column layout
- 16px page padding

---

# Component Standards

Buttons

Primary

- Telkom Red background
- White text

Secondary

- White background
- Gray border

Danger

- Red

Buttons must have:

- consistent height
- consistent border radius
- transition-colors
- keyboard focus state

---

Inputs

All inputs must have:

- same height
- same border radius
- same padding
- same focus state
- same typography

---

Cards

Cards must have:

- White background
- 1px border
- Rounded corners
- No shadow by default
- Soft shadow on hover only
- Consistent padding

---

Tables

Every table must have:

- Sticky header
- Consistent row height
- Hover state
- Responsive container
- Empty state
- Loading state
- Pagination

---

Badges

Use pill badges.

Avoid bright colors.

Status colors should use subtle background tints.

---

Icons

Use Heroicons or Lucide Icons only.

Do not use emojis.

---

# CRUD Page Structure

Every CRUD page must contain:

- Page Title
- Short Description
- Primary Action Button
- Search
- Filter
- Responsive Table
- Pagination
- Confirmation Modal
- Empty State
- Loading State

Every CRUD page must use the same layout and spacing.

---

# Dashboard Structure

Dashboard should contain:

Top Section

- Total Products
- Available Products
- Borrowed Products
- Total Borrowings

Middle Section

- Statistics Chart
- Inventory Summary

Bottom Section

- Recent Borrowings
- Latest Activities

Dashboard cards must use the same design language as every other page.

---

# Authentication

Authentication pages must preserve Laravel Breeze functionality.

Only redesign the frontend.

Keep:

- Login
- Register
- Forgot Password
- Reset Password
- Verify Email
- Confirm Password

Do not modify authentication logic.

---

# Responsive Rules

Every page must work correctly on:

Desktop

Tablet

Mobile

Avoid horizontal scrolling.

The layout should naturally adapt to smaller screens.

---

# Accessibility

Every interactive component must include:

- Visible focus state
- Keyboard accessibility
- Proper color contrast
- Semantic HTML

---

# Tailwind Rules

Use Tailwind CSS best practices.

Avoid:

- Inline CSS
- Inline styles
- Random spacing values
- Random border radius
- Fixed heights unless required
- overflow-hidden on page containers
- unnecessary absolute positioning

Prefer:

- flex
- grid
- gap utilities
- min-h-screen
- max-w-7xl
- reusable utility classes

---

# Blade Rules

Use:

- Blade Components
- @include
- @extends
- @section

Reduce duplicated code whenever possible.

Follow DRY principles.

---

# Code Quality

Follow:

- Laravel Blade best practices
- PSR-12
- Semantic HTML
- Responsive-first development
- Component reusability

Keep the implementation maintainable.

---

# AI Implementation Rules

When implementing this project:

- Read DESIGN.md completely before making changes.
- Treat DESIGN.md as the only design reference.
- Do not redesign the UI.
- Do not invent new components.
- Do not invent new colors.
- Preserve Laravel Breeze functionality.
- Preserve authentication logic.
- Preserve backend logic.
- Preserve routes unless explicitly instructed.
- Preserve Blade architecture.
- Improve implementation quality only.
- Maintain consistent spacing.
- Maintain consistent typography.
- Maintain consistent colors.
- Maintain responsive behavior.

Before finishing:

Review every modified page.

Verify:

- DESIGN.md compliance
- Responsiveness
- Accessibility
- Blade best practices
- Tailwind best practices
- Component consistency
- Layout consistency
- Spacing consistency
- Typography consistency

The final result should feel like one cohesive enterprise application rather than separate pages.