# Brivona Design System & Implementation-Ready UI Guidance

> **Design Intent**: The Brivona design system delivers a token-driven, accessible, and structured UI architecture engineered to provide knowledge seekers and readers with a fast, high-contrast, and predictable content reading experience across all viewports.

---

## 1. Context and Goals

### 1.1 Product Context
- **Brand / Product**: Brivona
- **Reference Surface**: Content Site ([https://brivona-demo.themetechmount.com/demo3/](https://brivona-demo.themetechmount.com/demo3/))
- **Primary Audience**: Readers, researchers, and knowledge seekers consuming long-form, multi-category informational content.
- **Product Surface Characteristics**: Heavy editorial layout with high density across six core component categories:
  - **Links**: High frequency (density: 207 occurrences)
  - **Cards**: High frequency (density: 51 occurrences)
  - **Lists**: Moderate-high frequency (density: 31 occurrences)
  - **Navigation**: Structural frequency (density: 16 occurrences)
  - **Buttons**: Focal call-to-action frequency (density: 14 occurrences)
  - **Inputs**: Form and search frequency (density: 11 occurrences)

### 1.2 Core Objectives
- **Systematic Predictability**: Eliminate arbitrary CSS values by binding 100% of visual properties to design tokens.
- **Strict Accessibility Compliance**: Enforce WCAG 2.2 Level AA compliance across all components with zero focus traps or contrast failures.
- **Performance & Delivery Speed**: Standardize component variants, reducing layout thrash and style duplication.

---

## 2. Design Tokens and Foundations

All components must consume design tokens defined in this section. Hardcoded pixel, hex, or timing values are strictly prohibited.

### 2.1 Typography Tokens
- **Primary Font Family**: `var(--font-family-primary, 'Karla')`
- **Fallback Font Stack**: `var(--font-family-stack, 'Karla', Tahoma, Geneva, sans-serif)`
- **Base Body Settings**: Font size `16px`, weight `400`, line height `25px`.

| Token Name | Value | Recommended Usage / Scope |
| :--- | :--- | :--- |
| `font.size.xs` | `0px` | Visually hidden / screen-reader-only utility (`.sr-only`), zero-size icon clip boundaries |
| `font.size.sm` | `13px` | Meta tags, timestamps, breadcrumbs, helper captions |
| `font.size.md` | `14px` | Secondary navigation links, input placeholders, badges, compact list items |
| `font.size.lg` | `15px` | Primary UI controls, card category labels, table headers, compact card body |
| `font.size.xl` | `16px` | Standard body text, main reading paragraphs, form input text, default button label |
| `font.size.2xl` | `17px` | Emphasized lead copy, subheadings (H4), card title compact |
| `font.size.3xl` | `18px` | Section sub-headers, card primary titles (H3), blockquote callouts |
| `font.size.4xl` | `20px` | Major section headers (H2), hero titles, primary page titles (H1) |

- **Line Height Scale**:
  - `font.lineHeight.tight`: `1.2` (Used for headings `font.size.3xl` - `font.size.4xl`)
  - `font.lineHeight.base`: `25px` (Standard reading line height for `font.size.xl`)
  - `font.lineHeight.loose`: `1.65` (Long-form prose content)
- **Font Weight Tokens**:
  - `font.weight.regular`: `400`
  - `font.weight.medium`: `500`
  - `font.weight.bold`: `700`

### 2.2 Color Tokens

| Semantic Token | Hex / Value | Contrast Ratio on Light Surface (`#FFFFFF`) | Contrast Ratio on Dark Surface (`#000000`) | Intended Role |
| :--- | :--- | :--- | :--- | :--- |
| `color.text.primary` | `#223645` | **10.9:1** (Passes WCAG AAA) | — | Primary headings, editorial body copy, active inputs |
| `color.text.secondary` | `#647589` | **4.8:1** (Passes WCAG AA) | — | Meta info, reading time, published dates, input placeholders |
| `color.text.inverse` | `#e12454` | **4.54:1** (Passes WCAG AA) | **4.62:1** (Passes WCAG AA) | Interactive accents, hover states, error states, brand badges |
| `color.border.muted` | `#ffffff` | N/A | — | White dividers on dark cards, light overlays, contrast separators |
| `color.surface.base` | `#000000` | — | Base | Dark section backgrounds, footer base, contrast contrast blocks |
| `color.surface.strong` | `#535353` | — | **5.3:1** (against white text) | Card dark panels, secondary container surfaces |

#### Additional Semantic Mappings
- `color.surface.canvas`: `#ffffff` (Standard editorial reading background)
- `color.surface.subtle`: `#f7f9fa` (Subtle card container and search input fill)
- `color.border.default`: `#d8e0e8` (Input borders, standard card borders)
- `color.focus.ring`: `#e12454` (Standard focus outline ring)
- `color.state.disabled.text`: `#8e9aa8`
- `color.state.disabled.surface`: `#ebeff2`

### 2.3 Spacing Scale Tokens
Components must only use steps from this 8-point dense scale for margins, paddings, and gap definitions:

| Token | Computed Value | Primary Application |
| :--- | :--- | :--- |
| `space.1` | `4px` | Inline icon gaps, badge vertical padding |
| `space.2` | `5px` | Micro-separators, tag horizontal padding |
| `space.3` | `7px` | Compact list item vertical padding |
| `space.4` | `10px` | Input internal vertical padding, button vertical padding |
| `space.5` | `13px` | Dense card inner gutter, input horizontal padding |
| `space.6` | `14px` | Standard card meta separator, button horizontal padding |
| `space.7` | `15px` | List item indentation, stacked section gap (compact) |
| `space.8` | `16px` | Standard card padding, grid gutter, layout column offset |

### 2.4 Border Radius Tokens
| Token | Computed Value | Implementation Target |
| :--- | :--- | :--- |
| `radius.xs` | `5px` | Form inputs, dropdown menus, inline code blocks |
| `radius.sm` | `8px` | Standard content cards, thumbnail images, alert containers |
| `radius.md` | `30px` | Secondary pill buttons, badge containers, filter chips |
| `radius.lg` | `34px` | Primary call-to-action buttons, search bar containers |
| `radius.xl` | `50px` | Floating action triggers, circular avatar containers, icon badges |

### 2.5 Motion and Transition Tokens
Transitions must always respect `prefers-reduced-motion: reduce`.

| Token | Duration | Timing Function | Target Interaction |
| :--- | :--- | :--- | :--- |
| `motion.duration.instant` | `200ms` | `cubic-bezier(0.4, 0, 0.2, 1)` | Color shifts, link underlines, icon rotation |
| `motion.duration.fast` | `300ms` | `cubic-bezier(0.4, 0, 0.2, 1)` | Dropdown expansion, card hover elevation |
| `motion.duration.normal` | `400ms` | `cubic-bezier(0, 0, 0.2, 1)` | Off-canvas drawer sliding, modal reveal |

---

## 3. Component-Level Implementation Rules

### 3.1 Links (Density: 207 occurrences)
Links constitute the highest density interaction on Brivona editorial pages.

#### Anatomy
1. **Container / Inline Wrapper**
2. **Leading / Trailing Icon** (optional, e.g., external link indicator or arrow)
3. **Anchor Text** (must use `font.family.primary`)
4. **Underline / Indicator** (1px solid border or text-decoration)

#### Variants
- **Editorial Inline Link**: Embedded within running body text (`font.size.xl`).
- **Navigation / Menu Link**: Standalone navigation link (`font.size.md` to `font.size.lg`).
- **Card Header Link**: Title link inside cards (`font.size.2xl` to `font.size.3xl`).
- **Meta Link**: Author, category, or tag links (`font.size.sm`).

#### Required States
- **Default**: Text color `color.text.primary`. Inline links must have a visible underline or distinct 4.5:1 color difference with clear hover affordance.
- **Hover**: Text color transitions to `color.text.inverse` using `motion.duration.instant`.
- **Focus-Visible**: Must display a `2px solid color.focus.ring` outline with a `2px` offset. Never hide the browser outline without providing this tokenized replacement.
- **Active**: Text color `color.text.primary` with underline shift; `transform: translateY(1px)`.
- **Disabled**: Marked with `aria-disabled="true"`, text color `color.state.disabled.text`, pointer-events set to `none`.
- **Loading**: Displays subtle pulsing animation or skeleton replacement; text remains legible.
- **Error / Broken**: Text color `color.text.inverse` with dotted underline and `aria-invalid="true"`.

#### Interaction Behavior
- **Keyboard**: Must be activated via the `Enter` key. Tab key navigation must follow DOM order without disruption.
- **Pointer**: Cursor must switch to `pointer`. Tooltip should appear if the link truncates or opens an external resource.
- **Touch**: Tap target must be at least 44×44px or have sufficient line-height clearance (`space.4` vertical touch buffer).

#### Edge-Case & Overflow Handling
- Inline links must break naturally across lines without clip-path issues (`overflow-wrap: break-word`).
- In compact cards, titles exceeding 2 lines must truncate cleanly with an ellipsis (`-webkit-line-clamp: 2`).

---

### 3.2 Cards (Density: 51 occurrences)
Cards organize articles, knowledge hubs, and featured topics.

#### Anatomy
1. **Card Container**: Border radius `radius.sm`, background `color.surface.canvas` or `color.surface.base`.
2. **Media / Thumbnail**: Aspect ratio 16:9 or 4:3, border radius `radius.sm` (top corners).
3. **Category Badge / Pill**: Font size `font.size.sm`, padding `space.1` vertical / `space.3` horizontal, radius `radius.md`.
4. **Card Title**: Heading tag (`<h3>`), font size `font.size.3xl`, line height `font.lineHeight.tight`, color `color.text.primary`.
5. **Body Excerpt**: Font size `font.size.lg`, color `color.text.secondary`, line height `font.lineHeight.base`.
6. **Card Footer / Meta**: Author name, reading time, published date (`font.size.sm`, `color.text.secondary`).

#### Variants
- **Standard Editorial Card**: Vertical stacked layout on white surface.
- **Dark Inverted Card**: Container background `color.surface.base` with text `color.border.muted`.
- **Horizontal Compact Card**: Thumbnail on left (`space.8` width), content on right.

#### Required States
- **Default**: Border `1px solid color.border.default`, shadow none.
- **Hover**: Border color shifts to `color.text.inverse` or subtle shadow elevation; transition duration `motion.duration.fast`.
- **Focus-Visible**: When focus lands on the nested title link, the entire card perimeter must display a `2px solid color.focus.ring` outline using `:focus-within`.
- **Active**: Card scale drops to `0.995` for immediate tactile feedback.
- **Disabled / Archived**: Opacity `0.6`, cursor `not-allowed`.
- **Loading**: Render skeleton pulse covering thumbnail, title block (2 lines), and meta bar.
- **Error**: Render error placeholder card with retry button and clear status message.

#### Responsive & Edge-Case Handling
- **Empty State**: When no cards are available (e.g., empty search query), render an empty-state container with informative text (`font.size.xl`) and a reset button.
- **Long Titles**: Titles must expand up to 3 lines before applying `-webkit-line-clamp: 3`. Text must not overflow card boundaries.
- **Missing Images**: Fall back to a solid `color.surface.strong` background containing the Brivona monogram badge.

---

### 3.3 Lists (Density: 31 occurrences)
Lists represent article rankings, category indexes, table-of-contents, and metadata groupings.

#### Anatomy
1. **List Container (`<ul>` or `<ol>`)**: Semantic HTML element with zero default margin.
2. **List Item (`<li>`)**: Vertical padding `space.3` to `space.4`, horizontal padding `space.2`.
3. **Bullet / Counter / Icon**: Custom marker or bullet colored with `color.text.inverse`.
4. **Item Content**: Typographic node bound to `font.size.lg` or `font.size.xl`.
5. **Divider**: Border bottom `1px solid color.border.default` (optional based on variant).

#### Variants
- **Ranked Article List**: Numbered counter with `font.size.2xl`, bold weight `font.weight.bold`, color `color.text.inverse`.
- **Category Index List**: Horizontal or vertical pills with post counts.
- **Reading Guide / Table of Contents**: Indented list with active reading progress indicator.

#### Required States
- **Default**: Item text `color.text.primary`, background transparent.
- **Hover**: Background tint `color.surface.subtle`, marker shifts `2px` right using `motion.duration.instant`.
- **Focus-Visible**: Nested focusable item shows `2px solid color.focus.ring`.
- **Active**: Item background `color.surface.strong` (at 10% opacity).
- **Disabled**: Item text `color.state.disabled.text`, marker muted.
- **Loading**: 4 stacked skeleton bars with heights matching `font.size.lg`.
- **Error**: Empty list message with error banner.

#### Keyboard & Accessibility Behavior
- Must retain native list semantics (`role="list"` if CSS removes default list-style in WebKit).
- Keyboard navigation within interactive list items must use `Tab` (or Arrow keys if implemented as a `role="listbox"` or `role="menu"`).

---

### 3.4 Navigation (Density: 16 occurrences)
Navigation elements encompass the primary header navbar, sub-category tabs, and pagination bars.

#### Anatomy
1. **Nav Landmark (`<nav>`)**: Must include descriptive `aria-label` (e.g., `aria-label="Main Navigation"`).
2. **Nav Brand / Logo Link**: Direct return link to homepage.
3. **Nav Link Items**: Font size `font.size.lg`, weight `font.weight.medium`.
4. **Dropdown Trigger**: Chevron icon rotating 180° on expanded state.
5. **Mobile Toggle Button**: Hamburger trigger with `aria-expanded` and `aria-controls`.

#### Variants
- **Primary Header Nav**: Sticky top navigation bar.
- **Topic Filter Bar**: Horizontally scrollable tab strip for article categories.
- **Pagination Nav**: Numbered pagination bar at the foot of index pages.

#### Required States
- **Default**: Background `color.surface.canvas` or `color.surface.base`, link text `color.text.primary`.
- **Hover**: Underline indicator animates in; text transitions to `color.text.inverse`.
- **Focus-Visible**: Clear `2px solid color.focus.ring` with `2px` offset.
- **Active / Current**: Link has `aria-current="page"`, bottom border `2px solid color.text.inverse`, weight `font.weight.bold`.
- **Disabled**: Nav item hidden or flagged with `aria-disabled="true"`.
- **Loading**: Sticky nav retains height (`60px`), items dimmed during route transition.
- **Error**: Route load failure triggers non-blocking toast warning.

#### Responsive & Edge-Case Handling
- **Breakpoints**: Under `1024px`, primary navigation must collapse into an off-canvas drawer.
- **Drawer Behavior**: Must trap keyboard focus within the drawer when open. Pressing `Escape` must close the drawer and return focus to the toggle button.
- **Touch Gesture**: Drawer must support swipe-to-close on mobile screens.

---

### 3.5 Buttons (Density: 14 occurrences)
Buttons drive reading actions, newsletter subscriptions, search submissions, and modal triggers.

#### Anatomy
1. **Button Container**: Height 44px (minimum touch target), border radius `radius.md` or `radius.lg`.
2. **Icon (Leading/Trailing)**: `16px` icon size, gap `space.2` from text.
3. **Label**: Font size `font.size.lg` or `font.size.xl`, weight `font.weight.medium`, text-transform none or uppercase (per variant).
4. **Loader / Spinner**: Replaces leading icon during async operations.

#### Variants
- **Primary Button**: Background `color.text.inverse`, text `#ffffff`, border radius `radius.lg`, padding `space.4` vertical / `space.7` horizontal.
- **Secondary Button**: Background `transparent`, border `2px solid color.text.primary`, text `color.text.primary`, radius `radius.md`.
- **Ghost / Icon Button**: Background `transparent`, border `none`, padding `space.3`, radius `radius.xl`.

#### Required States
- **Default**: Tokenized fill and border as defined above.
- **Hover**: Primary button darkens or applies scale(1.02); secondary button fills with `color.surface.subtle`.
- **Focus-Visible**: Must show `2px solid color.focus.ring` with `2px` offset.
- **Active**: `transform: scale(0.98)` with immediate tactile transition.
- **Disabled**: Attribute `disabled` present, background `color.state.disabled.surface`, text `color.state.disabled.text`, cursor `not-allowed`.
- **Loading**: `aria-busy="true"`, text visibility hidden or shifted, spinner visible in center, pointer events disabled.
- **Error**: Border pulses `color.text.inverse`, button displays inline error tooltip or shakes via CSS keyframes.

#### Interaction Behavior
- **Keyboard**: Must trigger on `Enter` and `Space`.
- **Pointer**: Transitions must use `motion.duration.instant`.
- **Touch**: Target dimensions must never drop below 44×44px.

---

### 3.6 Inputs (Density: 11 occurrences)
Inputs cover editorial search, newsletter signups, comment forms, and category filter fields.

#### Anatomy
1. **Label Element (`<label>`)**: Must be programmatically tied to the input via `for="..."` and `id="..."`. Font size `font.size.md`, weight `font.weight.medium`, color `color.text.primary`.
2. **Input Field**: Height 44px, border radius `radius.xs` (or `radius.lg` for search pill), padding `space.4` vertical / `space.5` horizontal.
3. **Placeholder**: Color `color.text.secondary`, font size `font.size.lg`.
4. **Helper / Validation Message**: Font size `font.size.sm`, positioned below input with `space.1` gap.
5. **Clear / Search Icon Button**: Right-aligned touch target (32×32px).

#### Variants
- **Global Search Input**: Pill shape (`radius.lg`), leading magnifying icon, background `color.surface.subtle`.
- **Standard Text Input / Textarea**: Box shape (`radius.xs`), border `1px solid color.border.default`.
- **Inline Newsletter Input**: Combined input and button group sharing contiguous borders.

#### Required States
- **Default**: Border `1px solid color.border.default`, background `#ffffff`, text `color.text.primary`.
- **Hover**: Border color shifts to `color.text.secondary`.
- **Focus-Visible**: Border color shifts to `color.text.inverse`, outline `2px solid color.focus.ring` with `0px` offset.
- **Active**: Retains focused ring state.
- **Disabled**: Attribute `disabled` set, background `color.state.disabled.surface`, cursor `not-allowed`.
- **Loading**: Right-side spinner active while querying async suggestions.
- **Error**: Border color `color.text.inverse`, `aria-invalid="true"`, helper text color `color.text.inverse` linked via `aria-describedby`.

#### Edge-Case & Overflow Handling
- Autocomplete attributes must be specified (`autocomplete="email"`, `autocomplete="off"`).
- Very long input values must scroll horizontally inside the input without clipping text glyphs.

---

## 4. Accessibility Requirements & Testable Acceptance Criteria

Target standard: **WCAG 2.2 Level AA**.

### 4.1 Contrast Constraints
1. **Normal Text (< 18pt / 24px or < 14pt / 18.5px bold)**:
   - Must achieve a contrast ratio of at least **4.5:1** against the background.
   - `color.text.primary` (`#223645`) on `#FFFFFF` yields **10.9:1** (Passes AAA).
   - `color.text.secondary` (`#647589`) on `#FFFFFF` yields **4.8:1** (Passes AA).
   - `color.text.inverse` (`#e12454`) on `#FFFFFF` yields **4.54:1** (Passes AA).
2. **Large Text (≥ 18pt / 24px or ≥ 14pt / 18.5px bold)**:
   - Must achieve at least **3:1** against the background.
3. **Non-Text Contrast (UI Controls & Graphical Objects)**:
   - Input borders, active button outlines, and icons must achieve at least **3:1** against adjacent backgrounds.

### 4.2 Keyboard-First Interaction Rules
1. **Sequential Navigation**: Every interactive element (all 207 links, 14 buttons, 11 inputs) must be reachable via `Tab` key in intuitive reading sequence.
2. **Zero Keyboard Traps**: Focus must never become locked in any dropdown, modal, or mobile navigation drawer.
3. **Escape Dismissal**: Open menus, dialogs, and mobile drawers must dismiss immediately upon pressing `Escape`, returning focus to the activator element.

### 4.3 Focus-Visible Standards
1. **Universal Focus Ring**: Focus indicator must be visible on all interactive elements: `outline: 2px solid var(--color-focus-ring)` with `outline-offset: 2px`.
2. **No Suppression Without Replacement**: Setting `outline: none` or `outline: 0` without an explicit `:focus-visible` replacement is strictly prohibited.

### 4.4 Testable Acceptance Criteria Table

| Check ID | Verification Rule | Test Method | Pass Criterion | Fail Criterion |
| :--- | :--- | :--- | :--- | :--- |
| **A11Y-01** | Color Contrast (Text) | Automated contrast checker (axe-core / Lighthouse) | All text elements achieve ≥ 4.5:1 ratio (≥ 3:1 for large text). | Any text node fails 4.5:1 against its background. |
| **A11Y-02** | Keyboard Reachability | Manual `Tab` traversal | Every link, button, input receives keyboard focus in sequence. | Element skipped or unreachable via keyboard. |
| **A11Y-03** | Focus Indicator Visibility | Visual inspection during `Tab` | 2px solid indicator visible against surrounding colors on all viewports. | Focus ring is invisible, truncated, or suppressed. |
| **A11Y-04** | Form Control Labeling | Automated DOM inspection | Every `<input>` has an explicit `<label for="...">` or `aria-label`. | Input lacks programmatic name; screen reader reads "unlabeled input". |
| **A11Y-05** | Modal / Drawer Focus Trap | Manual keyboard testing | Focus cycles within open mobile drawer; `Escape` key closes and returns focus. | Focus escapes behind backdrop, or drawer cannot be closed via keyboard. |
| **A11Y-06** | Target Size (Minimum) | Pointer / Layout inspection | Touch targets measure ≥ 44×44px or have sufficient surrounding spacing. | Interactive target measures < 24px without spacing buffer. |
| **A11Y-07** | Motion Sensitivity | Emulate `prefers-reduced-motion` | All transitions reduce to 0ms or gentle opacity fades. | Parallax or high-motion sliding animations continue running. |

---

## 5. Content and Tone Standards

### 5.1 Editorial Voice
- **Concise**: Deliver clarity in minimal words. Avoid ornamental prose.
- **Confident**: Present authoritative guidance for readers and knowledge seekers.
- **Implementation-Focused**: Action labels must specify what happens next.

### 5.2 Microcopy & CTA Examples

| Context | Prohibited / Ambiguous Copy | Recommended Standard | Rationale |
| :--- | :--- | :--- | :--- |
| **Button: Article Read** | "Click here", "More" | "Read full article", "Explore guide" | Provides clear context for screen reader users navigating links. |
| **Button: Newsletter** | "Submit", "Go" | "Subscribe to digest", "Get weekly updates" | States the explicit outcome of the transaction. |
| **Input Placeholder** | "Type here..." | "Search medical articles, topics, or keywords..." | Explains the expected input format and content scope. |
| **Error Message: Form** | "Invalid entry" | "Please enter a valid email address (e.g., name@domain.com)" | Offers immediate, actionable recovery steps. |
| **Empty State: Search** | "No data found." | "No articles match your query. Try adjusting your filters or browse trending topics below." | Prevents dead-ends by suggesting next steps. |

---

## 6. Anti-Patterns and Prohibited Implementations

### 6.1 Prohibited Rules ("Don't")
1. **No Raw Hex or Magic Values**:
   - ❌ `color: #e12454; margin: 12px;`
   - ✅ `color: var(--color-text-inverse); margin: var(--space-5);`
2. **No Suppression of Focus Outlines**:
   - ❌ `*:focus { outline: none; }`
   - ✅ `:focus-visible { outline: 2px solid var(--color-focus-ring); outline-offset: 2px; }`
3. **No Non-Semantic Click Handlers**:
   - ❌ `<div onClick={goToArticle}>Read</div>`
   - ✅ `<a href="/articles/slug">Read full article</a>`
4. **No Unbounded Typography Scaling**:
   - ❌ Arbitrary font sizes like `19px`, `22px`, or `33px`.
   - ✅ Strictly select from `font.size.xs` through `font.size.4xl`.
5. **No Missing States on Interactive Components**:
   - ❌ Building buttons that only support `default` and `hover`.
   - ✅ Every interactive component must define `default`, `hover`, `focus-visible`, `active`, `disabled`, `loading`, and `error`.
6. **No Vague or Identical Link Text**:
   - ❌ Rendering 50 links all named "Read More" without distinct accessible descriptions.
   - ✅ Provide visually hidden context: `<a href="...">Read More <span class="sr-only">about Clinical Cardiology Updates</span></a>`.

---

## 7. QA Verification Checklist

Before deploying any feature or page on Brivona, engineers and QA testers must verify all items:

### Tokens & Styling
- [ ] 100% of colors, margins, paddings, fonts, and radii map directly to CSS custom properties.
- [ ] No hardcoded `#hex` or arbitrary pixel spacing exists in component stylesheets.
- [ ] Typography scale conforms exclusively to `xs` (0px) through `4xl` (20px).

### Component Integrity
- [ ] **Links (207 density)**: All links display visible hover shifts and tokenized focus rings. Truncation works correctly.
- [ ] **Cards (51 density)**: Cards accommodate long titles (up to 3 lines) and fall back gracefully if thumbnail images fail.
- [ ] **Lists (31 density)**: Semantic `<ul>` / `<ol>` maintained; active reading markers align properly.
- [ ] **Navigation (16 density)**: Mobile drawer opens smoothly, traps focus, and closes via `Escape`.
- [ ] **Buttons (14 density)**: All 7 states (`default`, `hover`, `focus-visible`, `active`, `disabled`, `loading`, `error`) are validated.
- [ ] **Inputs (11 density)**: Labels programmatically bound; error states display clear helper text and `aria-invalid="true"`.

### Accessibility & Responsiveness
- [ ] Color contrast passes WCAG 2.2 AA (minimum 4.5:1 for normal text, 3:1 for UI controls).
- [ ] Keyboard navigation functions seamlessly without a mouse.
- [ ] Target size is at least 44×44px on mobile viewports.
- [ ] `prefers-reduced-motion` suppresses all non-essential transition effects.
- [ ] Zero console errors or accessibility violations reported by automated audit tools.
