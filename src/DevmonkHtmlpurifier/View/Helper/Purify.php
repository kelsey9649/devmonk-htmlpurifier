<?php

namespace DevmonkHtmlpurifier\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Class Purify
 * @package DevmonkHtmlpurifier\View\Helper
 */
class Purify extends AbstractHelper
{
    /** @var \HTMLPurifier */
    protected $purifier;

    /**
     * @param \HTMLPurifier $purifier
     */
    public function __construct(\HTMLPurifier $purifier)
    {
        $this->purifier = $purifier;
    }

    /**
     * @param string $dirtyHtml
     *
     * @return string
     */
    public function __invoke($dirtyHtml)
    {
        return $this->purifier->purify($dirtyHtml);
    }
}
