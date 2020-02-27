<?php
declare(strict_types=1);

namespace T3kit\themeT3kit\DataProcessing;

use TYPO3\CMS\Core\Utility\ArrayUtility;

/**
 * Extend original class with menuLevelConfig
 *
 * @package T3kit\themeT3kit\DataProcessing
 */
class LanguageMenuProcessor extends \TYPO3\CMS\Frontend\DataProcessing\LanguageMenuProcessor
{
    /**
     * Initialize
     * Extend original configuration
     */
    public function __construct()
    {
        $additionalMenuConfig = [
            'stdWrap.' => [
                'cObject.' => [
                    '25' => 'USER',
                    '25.' => [
                        'userFunc' => 'TYPO3\CMS\Frontend\DataProcessing\LanguageMenuProcessor->getFieldAsJson',
                        'language.' => [
                            'data' => 'register:languageId'
                        ],
                        'field' => 'flagIdentifier',
                        'stdWrap.' => [
                            'wrap' => ',"flagIdentifier":|',
                            'replacement.' => [
                                '10.' => [
                                    'search' => 'flags-',
                                    'replace' => ''
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        ArrayUtility::mergeRecursiveWithOverrule($this->menuLevelConfig, $additionalMenuConfig);

        parent::__construct();
    }
}
