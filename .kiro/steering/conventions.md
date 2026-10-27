# Conventions & Working Agreement — SO Living Bali

## Communication

- Chat and discussion with the user (Andri Sunardi) is in **Bahasa Indonesia**.
- Source code (identifiers, strings, commit messages, PR text) is in **English**.

## Code quality

- No inline code comments — code must be self-explanatory via clear naming.
- Follow **DRY, KISS, YAGNI, Tell-Don't-Ask, SOLID**. No dead/legacy code, no unused variables, no duplicated flows.
- Format PHP with **Laravel Pint**.
- Public site UI: **Bootstrap 5.3 only** (stock utilities/components). Do NOT add custom CSS classes or a bespoke theme for the public site. (The earlier "SLB" custom theme in `public/css/app.css` was reverted by owner request.)
- Target the actual installed versions. The project is on Bootstrap **5.3** — ignore any Bootstrap v6 docs/llms references.

## Testing

- Tests use **PHPUnit-style** feature/unit tests (`tests/Feature`, `tests/Unit`). Pest may be present only as a plugin; `phpunit/phpunit` is the real runner — confirm via `composer.json`.
- The suite must pass green before work is considered complete. Never claim green on an unverified/failing suite.
- Team standard also calls for Playwright for E2E/browser tests where applicable.

## Sandbox limitation (important)

- In the Kiro sandbox, **PHP cannot execute** (php 8.4 fails to load `libgd.so.3`). So `php artisan`, migrations, `./vendor/bin/pint`, the test suite, and `npm run build` CANNOT be run here. Verify by careful reading instead, and always tell the user the exact commands to run locally. Never fake green results.

## Git / delivery flow (owner's standing instruction)

For EVERY change, follow this flow and go all the way through to merge — do not stop midway to ask for merge confirmation:

1. **Diff** — review the change.
2. **Stage** — `git add` the specific relevant files (not `git add .`).
3. **Push** — via the provider push tool (never raw `git push`), on a dedicated branch (never commit directly to `main`).
4. **Open a Pull Request** to `main`.
5. **Approve & merge the PR into `main`** immediately.

Notes:
- Always branch + PR; never push straight to `main`.
- After merge, always report the PR link and remind the user of any local steps (migrate, pint, test, hard-refresh) since the sandbox can't run them.
- If a change is genuinely risky/ambiguous in a big way, flag it first — otherwise proceed straight to merge.
- Scope is the **`so-living-bali` repository only**. Do not clone or connect to any other repository, and do not mix in other chat sessions.

## Steering upkeep

- Keep `.kiro/steering/*` current. When a session produces important decisions/changes, update the steering files (especially `work-log.md`) and ship them through the same flow (push → PR → merge to `main`) so a new session starts with full context.
