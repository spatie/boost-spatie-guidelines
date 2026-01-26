<?php

use Spatie\BoostSpatieGuidelines\Tests\TestCase;

uses(TestCase::class);

it('has guidelines file in resources directory', function () {
    $guidelinesPath = __DIR__.'/../resources/boost/guidelines/core.blade.php';

    expect(file_exists($guidelinesPath))->toBeTrue();
});

it('guidelines file is readable', function () {
    $guidelinesPath = __DIR__.'/../resources/boost/guidelines/core.blade.php';

    expect(is_readable($guidelinesPath))->toBeTrue();
});

it('guidelines file contains expected content', function () {
    $guidelinesPath = __DIR__.'/../resources/boost/guidelines/core.blade.php';
    $content = file_get_contents($guidelinesPath);

    expect($content)
        ->toContain('Laravel & PHP Guidelines')
        ->toContain('Spatie')
        ->toContain('PSR-1')
        ->toContain('Follow Laravel conventions');
});

it('guidelines file contains key sections', function () {
    $guidelinesPath = __DIR__.'/../resources/boost/guidelines/core.blade.php';
    $content = file_get_contents($guidelinesPath);

    $expectedSections = [
        'Core Laravel Principle',
        'PHP Standards',
        'Class Structure',
        'Type Declarations & Docblocks',
        'Control Flow',
        'Laravel Conventions',
        'Testing',
        'Quick Reference',
    ];

    foreach ($expectedSections as $section) {
        expect($content)->toContain($section);
    }
});
