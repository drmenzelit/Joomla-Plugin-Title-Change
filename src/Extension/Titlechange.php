<?php
/**
 * System Plugin for Joomla! - Title change
 *
 * @author     Viviana Menzel <vivianamenzel@dr-menzel-it.de>
 * @copyright  Copyright 2015 - 2025 Viviana Menzel
 * @license    GNU General Public License version 3 or later
 * @link       http://www.dr-menzel-it.de/
 */

namespace Drmenzelit\Plugin\System\Titlechange\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Event\Application\AfterRenderEvent;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

/**
 * Class PlgSystemTitlechange
 *
 * @since  1.0.0
 */

final class Titlechange extends CMSPlugin implements SubscriberInterface
{
    /**
     * Returns an array of CMS events this plugin will listen to and the respective handlers.
     *
     * @return  array
     *
     * @since  5.1.0
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onAfterRender'     => 'onAfterRender',
        ];
    }

    /**
     * Plugin that changes titles.
     *
     * @param   AfterRenderEvent $event  The event instance.
     *
     * @return  void
     *
     * @since   2.5
     */
    public function onAfterRender(AfterRenderEvent $event): void
    {
        // Don't run this plugin in the Admin
        $app = $event->getApplication();
        if (!$app->isClient('site')) {
            return;
        }

        $body = $app->getBody();

        if (strpos($body, '{titlechange') !== false)
        {
            $body = $this->replaceTags($body);
            $app->setBody($body);
        }
    }
    /**
     * Method to replace tags in a text
     *
     * @param   string  $text  Text to replace tags in
     *
     * @return  string
     *
     * @since   1.0.0
     */
    public function replaceTags($text)
    {
        // This regEx search for {titlechange:myClass my text} parts inside a <title></title> tag, should only appear once...
        while (preg_match_all('/<title>([^\{\}]*){titlechange:([^\s}]+)\ ([^\}]+)\}(.*?)<\/title>/', $text, $matches))
        {
            foreach ($matches[2] as $matchIndex => $match)
            {
                $tag    = $matches[0][$matchIndex];
                $group1 = $matches[1][$matchIndex];
                $group3 = $matches[3][$matchIndex];
                $group4 = $matches[4][$matchIndex];
                $text   = str_replace($tag, "<title>" . $group1 . $group3 . $group4 . "</title>", $text);
            }
        }

        // This regEx search for {titlechange:myClass [([^\s}]+)\] my text [([^\}]+)\]} parts
        if (preg_match_all('/{titlechange:([^\s}]+)\ ([^\}]+)\}/', $text, $matches))
        {
            foreach ($matches[2] as $matchIndex => $match)
            {
                $tag       = $matches[0][$matchIndex];
                $classname = $matches[1][$matchIndex];
                $text      = str_replace($tag, "<span class=" . $classname . ">" . $match . "</span>", $text);
            }
        }

        return $text;
    }
}
