# ООП славянам!

Легендарный курс выживания по объектно-ориентированному программированию на C++.

## Локальный запуск

Сайт написан на PHP и использует общие шаблоны `header.php` и `footer.php`.

```bash
php -S 127.0.0.1:8099 -t .
```

Открыть: <http://127.0.0.1:8099/index.php>

## GitHub Pages

GitHub Pages не исполняет PHP, поэтому для публикации собирается статическая версия сайта.

```bash
bash scripts/build-pages.sh
python3 -m http.server 8100 --directory dist
```

Готовая статика складывается в `dist/` и не коммитится в репозиторий.

При пуше в `master` workflow `.github/workflows/pages.yml` сам собирает сайт и публикует его через GitHub Actions.

### Первая публикация

GitHub Pages нужно один раз включить вручную — workflow не может сделать это от имени `GITHUB_TOKEN`:

1. Открыть **Settings → Pages** репозитория.
2. В блоке **Build and deployment** выбрать **Source: GitHub Actions**.
3. Открыть **Actions → Deploy GitHub Pages** и нажать **Re-run all jobs** (или сделать новый пуш в `master`).

После этого сайт будет доступен по адресу <https://nikskul.github.io/vstu-cpp-legend-site/>.

## Ветки

- `master` — актуальная версия сайта.
- `old-school` — исходная старая версия.
