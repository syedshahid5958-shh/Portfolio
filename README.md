# Portfolio-C1

A modular portfolio front-end powered by HTML, CSS, JavaScript, XML/XSLT, and a PHP dashboard backed by MySQL-ready code.

## File Map

- `index.html` – main landing page wired to the shared styles and scripts.
- `style.css` – dark neon UI theme used across sections.
- `script.js` – custom cursor, form validation, and XML→HTML rendering.
- `data.xml` – project catalogue consumed on the client side.
- `style.xsl` – transforms `data.xml` into accessible project cards.
- `dashboard.php` – PHP session demo plus MySQL-ready dashboard.
- `portfoli-sayad.html` – legacy single-file version kept for reference.

## Quick Start

### Static front-end
Open `index.html` directly in the browser or serve the folder through any static HTTP server to avoid CORS blocks while fetching XML/XSL.

### PHP dashboard (requires PHP 8+)
```powershell
cd f:\Clients_Projects\Portfolio-C1
php -S localhost:8000
```
Visit `http://localhost:8000/dashboard.php` to view the dashboard. Update the `$dbConfig` values inside `dashboard.php` to point at your MySQL instance and ensure a `contact_messages` table exists (columns: `name`, `email`, `message`, `created_at`).

## XML / XSL preview
`data.xml` ships with a `<?xml-stylesheet?>` directive, so opening it in browsers that support XSLT will show the transformed project cards without any additional tooling.
