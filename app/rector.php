<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Symfony\Set\SymfonySetList;
use Rector\Symfony\Symfony62\Rector\MethodCall\SimplifyFormRenderingRector;

return static function (RectorConfig $rectorConfig): void {
    // Permet de définir tous les chemins que doit parcourir Rector
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    // register a single rule
    // Symplify form rendering by not calling ->createView() on render function
    $rectorConfig->rule(SimplifyFormRenderingRector::class);

    $rectorConfig->symfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml');

    // define sets of rules
    $rectorConfig->sets([
        SymfonySetList::SYMFONY_63,
        SymfonySetList::SYMFONY_CODE_QUALITY,
    ]);
};
