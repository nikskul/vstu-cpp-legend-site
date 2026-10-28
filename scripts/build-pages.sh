#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DIST="$ROOT/dist"

PAGES=(
	index
	lb1
	lb2
	lb3
	lb4
	lb5
	lb6
	lb7
	lb8
	class
	kursach
)

cd "$ROOT"
rm -rf "$DIST"
mkdir -p "$DIST"

for page in "${PAGES[@]}"; do
	php -d display_errors=stderr -d error_reporting=E_ALL \
		"$ROOT/scripts/render-page.php" "$page" > "$DIST/$page.html"

	if [ ! -s "$DIST/$page.html" ]; then
		echo "Пустая страница: $page" >&2
		exit 1
	fi
done

cp -R "$ROOT/css" "$ROOT/js" "$ROOT/img" "$DIST/"
mkdir -p "$DIST/includes"
cp "$ROOT/includes/Halogen - U Got That.mp4" "$DIST/includes/"
cp "$ROOT/includes/theory.pdf" "$DIST/includes/"

# В статике PHP-ссылки должны вести на готовые HTML-страницы.
perl -pi -e 's/\b(href|src|action)="([^"]*?)\.php/$1="$2.html/g' "$DIST"/*.html

# GitHub Pages не должен пытаться обрабатывать сайт через Jekyll.
touch "$DIST/.nojekyll"

# Права не должны зависеть от настроек директорий в локальном окружении.
find "$DIST" -type d -exec chmod 755 {} +
find "$DIST" -type f -exec chmod 644 {} +

echo "Статическая сборка готова: $DIST"
