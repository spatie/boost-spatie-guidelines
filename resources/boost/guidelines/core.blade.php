{{--
    Spatie's Laravel & PHP Guidelines for AI Code Assistants

    Source: https://spatie.be/guidelines/laravel-php
    Maintained by: Spatie (https://spatie.be)

    These guidelines are derived from Spatie's comprehensive Laravel & PHP standards
    and optimized for AI code assistants like Claude Code, GitHub Copilot, and Cursor.
--}}

# Laravel & PHP Guidelines for AI Code Assistants

This file contains Laravel and PHP coding standards optimized for AI code assistants like Claude Code, GitHub Copilot, and Cursor. These guidelines are derived from Spatie's comprehensive Laravel & PHP standards.

## Core Laravel Principle

**Follow Laravel conventions first.** If Laravel has a documented way to do something, use it. Only deviate when you have a clear justification.

## PHP Standards

- Follow PSR-1, PSR-2, and PSR-12
- Use camelCase for non-public-facing strings
- Use short nullable notation: `?string` not `string|null`
- Always specify `void` return types when methods return nothing

## Class Structure
- Use typed properties, not docblocks:
- Constructor property promotion when all properties can be promoted:
- One trait per line:

## Type Declarations & Docblocks
- Use typed properties over docblocks
- Specify return types including `void`
- Use short nullable syntax: `?Type` not `Type|null`
- Document iterables with generics:
@verbatim
  ```php
  /** @return Collection<int, User> */
  public function getUsers(): Collection
  ```
@endverbatim

### Docblock Rules
- Don't use docblocks for fully type-hinted methods (unless description needed)
- **Always import classnames in docblocks** - never use fully qualified names:
@verbatim
  ```php
  use \Spatie\Url\Url;
  /** @return Url */
  ```
@endverbatim
- Use one-line docblocks when possible: `/** @var string */`
- Most common type should be first in multi-type docblocks:
@verbatim
  ```php
  /** @var Collection|SomeWeirdVendor\Collection */
  ```
@endverbatim
- If one parameter needs docblock, add docblocks for all parameters
- For iterables, always specify key and value types:
@verbatim
  ```php
  /**
   * @param array<int, MyObject> $myArray
   * @param int $typedArgument
   */
  function someFunction(array $myArray, int $typedArgument) {}
  ```
@endverbatim
- Use array shape notation for fixed keys, put each key on it's own line:
@verbatim
  ```php
  /** @return array{
     first: SomeClass,
     second: SomeClass
  } */
  ```
@endverbatim

## Control Flow
- **Happy path last**: Handle error conditions first, success case last
- **Avoid else**: Use early returns instead of nested conditions
- **Separate conditions**: Prefer multiple if statements over compound conditions
- **Always use curly brackets** even for single statements
- **Ternary operators**: Each part on own line unless very short

@verbatim
```php
// Happy path last
if (! $user) {
    return null;
}

if (! $user->isActive()) {
    return null;
}

// Process active user...

// Short ternary
$name = $isFoo ? 'foo' : 'bar';

// Multi-line ternary
$result = $object instanceof Model ?
    $object->name :
    'A default value';

// Ternary instead of else
$condition
    ? $this->doSomething()
    : $this->doSomethingElse();
```
@endverbatim

## Laravel Conventions

### Routes
- URLs: kebab-case (`/open-source`)
- Route names: camelCase (`->name('openSource')`)
- Parameters: camelCase (`{userId}`)
- Use tuple notation: `[Controller::class, 'method']`

### Controllers
- Plural resource names (`PostsController`)
- Stick to CRUD methods (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`)
- Extract new controllers for non-CRUD actions

### Configuration
- Files: kebab-case (`pdf-generator.php`)
- Keys: snake_case (`chrome_path`)
- Add service configs to `config/services.php`, don't create new files
- Use `config()` helper, avoid `env()` outside config files

### Artisan Commands
- Names: kebab-case (`delete-old-records`)
- Always provide feedback (`$this->comment('All ok!')`)
- Show progress for loops, summary at end
- Put output BEFORE processing item (easier debugging):
@verbatim
  ```php
  $items->each(function(Item $item) {
      $this->info("Processing item id `{$item->id}`...");
      $this->processItem($item);
  });

  $this->comment("Processed {$items->count()} items.");
  ```
@endverbatim

## Strings & Formatting

- **String interpolation** over concatenation:

## Enums

- Use PascalCase for enum values:

## Comments

- **Avoid comments** - write expressive code instead
- When needed, use proper formatting:
@verbatim
  ```php
  // Single line with space after //

  /*
   * Multi-line blocks start with single *
   */
  ```
@endverbatim
- Refactor comments into descriptive function names

## Whitespace

- Add blank lines between statements for readability
- Exception: sequences of equivalent single-line operations
- No extra empty lines between `{}` brackets
- Let code "breathe" - avoid cramped formatting

## Validation

- Use array notation for multiple rules (easier for custom rule classes):
@verbatim
  ```php
  public function rules() {
      return [
          'email' => ['required', 'email'],
      ];
  }
  ```
@endverbatim
- Custom validation rules use snake_case:
@verbatim
  ```php
  Validator::extend('organisation_type', function ($attribute, $value) {
      return OrganisationType::isValid($value);
  });
  ```
@endverbatim

## Blade Templates

- Indent with 4 spaces
- No spaces after control structures:
@verbatim
  ```blade
  @if($condition)
      Something
  @endif
  ```
@endverbatim

## Authorization

- Policies use camelCase: `Gate::define('editPost', ...)`
- Use CRUD words, but `view` instead of `show`

## Translations

- Use `__()` function over `@lang`:

## API Routing

- Use plural resource names: `/errors`
- Use kebab-case: `/error-occurrences`
- Limit deep nesting for simplicity:
  ```
  /error-occurrences/1
  /errors/1/occurrences
  ```

## Testing

- Keep test classes in same file when possible
- Use descriptive test method names
- Follow the arrange-act-assert pattern

## Quick Reference

### Naming Conventions
- **Classes**: PascalCase (`UserController`, `OrderStatus`)
- **Methods/Variables**: camelCase (`getUserName`, `$firstName`)
- **Routes**: kebab-case (`/open-source`, `/user-profile`)
- **Config files**: kebab-case (`pdf-generator.php`)
- **Config keys**: snake_case (`chrome_path`)
- **Artisan commands**: kebab-case (`php artisan delete-old-records`)

### File Structure
- Controllers: plural resource name + `Controller` (`PostsController`)
- Views: camelCase (`openSource.blade.php`)
- Jobs: action-based (`CreateUser`, `SendEmailNotification`)
- Events: tense-based (`UserRegistering`, `UserRegistered`)
- Listeners: action + `Listener` suffix (`SendInvitationMailListener`)
- Commands: action + `Command` suffix (`PublishScheduledPostsCommand`)
- Mailables: purpose + `Mail` suffix (`AccountActivatedMail`)
- Resources/Transformers: plural + `Resource`/`Transformer` (`UsersResource`)
- Enums: descriptive name, no prefix (`OrderStatus`, `BookingType`)

### Migrations
- do not write down methods in migrations, only up methods

### Code Quality Reminders

#### PHP
- Use typed properties over docblocks
- Prefer early returns over nested if/else
- Use constructor property promotion when all properties can be promoted
- Avoid `else` statements when possible
- Use string interpolation over concatenation
- Always use curly braces for control structures

---

*These guidelines are maintained by [Spatie](https://spatie.be/guidelines) and optimized for AI code assistants.*
