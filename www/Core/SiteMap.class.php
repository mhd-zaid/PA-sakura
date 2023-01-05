<?php

namespace App\Core;
use XMLWriter;

class SiteMap{
    private $siteMapService;

    private $domain;

    /**
     *
     * @var XMLWriter
     */
    private $writer;

    private $path;

    private $filename = 'sitemap';

    private $current_item = 0;

    private $current_sitemap = 0;

    const EXT = '.xml';

    const SCHEMA = 'http://www.sitemaps.org/schemas/sitemap/0.9';

    const DEFAULT_PRIORITY = 0.5;

    const ITEM_PER_SITEMAP = 50000;

    const SEPERATOR = '-';

    const INDEX_SUFFIX = 'index';

    public function __construct()
    {
        $this->setDomain($_SERVER['SERVER_NAME'].'/');
    }

    private function addHomePage()
    {
        // Home Page url
        $this->addItem("", "", "");
    }

    private function addSitePages($result)
    {
        if (! empty($result)) {
            foreach ($result as $k => $v) {
                $this->addItem($result[$k]);
            }
        }
    }

    public function generateSiteMap($result)
    {
        $this->addHomePage();
        $this->addSitePages($result);
        $siteMapResult = $this->createSitemapIndex($this->domain, 'Now');
        return $result;
    }

    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    private function getDomain()
    {
        return $this->domain;
    }

    private function getWriter()
    {
        return $this->writer;
    }

    private function setWriter(XMLWriter $writer)
    {
        $this->writer = $writer;
    }

    private function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    private function getFilename()
    {
        return $this->filename;
    }
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    private function getCurrentItem()
    {
        return $this->current_item;
    }

    private function incCurrentItem()
    {
        $this->current_item = $this->current_item + 1;
    }


    private function getCurrentSitemap()
    {
        return $this->current_sitemap;
    }

    private function incCurrentSitemap()
    {
        $this->current_sitemap = $this->current_sitemap + 1;
    }

    private function startSitemap()
    {
        $this->setWriter(new XMLWriter());
        if ($this->getCurrentSitemap()) {
            $this->getWriter()->openURI($this->getPath() . $this->getFilename() . self::SEPERATOR . $this->getCurrentSitemap() . self::EXT);
        } else {
            $this->getWriter()->openURI($this->getPath() . $this->getFilename() . self::EXT);
        }
        $this->getWriter()->startDocument('1.0', 'UTF-8');
        $this->getWriter()->setIndent(true);
        $this->getWriter()->startElement('urlset');
        $this->getWriter()->writeAttribute('xmlns:xsi', "http://www.w3.org/2001/XMLSchema-instance");
        $this->getWriter()->writeAttribute('xsi:schemaLocation', "http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd");
        $this->getWriter()->writeAttribute('xmlns', self::SCHEMA);
    }

    public function addItem($loc, $priority = self::DEFAULT_PRIORITY, $changefreq = NULL, $lastmod = NULL)
    {
        if (($this->getCurrentItem() % self::ITEM_PER_SITEMAP) == 0) {
            if ($this->getWriter() instanceof XMLWriter) {
                $this->endSitemap();
            }
            $this->startSitemap();
            $this->incCurrentSitemap();
        }
        $this->incCurrentItem();
        $this->getWriter()->startElement('url');
        if ($loc == "http://localhost/") {
            $this->getWriter()->writeElement('loc', $loc);
        } else {
            $this->getWriter()->writeElement('loc', $this->getDomain() . $loc);
        }
        if ($lastmod)
            $this->getWriter()->writeElement('lastmod', $this->getLastModifiedDate($lastmod));
        if ($changefreq)
            $this->getWriter()->writeElement('changefreq', $changefreq);
            $this->getWriter()->endElement();
        return $this;
    }

    private function getLastModifiedDate($date)
    {
        if (ctype_digit($date)) {
            return date('c', $date);
        } else {
            $date = strtotime($date);
            return date('c', $date);
        }
    }

    private function endSitemap()
    {
        if (! $this->getWriter()) {
            $this->startSitemap();
        }
        $this->getWriter()->endElement();
        $this->getWriter()->endDocument();
    }
    
    public function createSitemapIndex($loc, $lastmod = 'Today')
    {
        $this->endSitemap();
        $indexwriter = new XMLWriter();
        $indexwriter->openURI($this->getPath() . $this->getFilename() . self::SEPERATOR . self::INDEX_SUFFIX . self::EXT);
        $indexwriter->startDocument('1.0', 'UTF-8');
        $indexwriter->setIndent(true);
        $indexwriter->startElement('sitemapindex');
        $indexwriter->writeAttribute('xmlns', self::SCHEMA);
        for ($index = 0; $index < $this->getCurrentSitemap(); $index ++) {
            $indexwriter->startElement('sitemap');
            $indexwriter->writeElement('loc', $loc . $this->getFilename() . ($index ? self::SEPERATOR . $index : '') . self::EXT);
            $indexwriter->writeElement('lastmod', $this->getLastModifiedDate($lastmod));
            $indexwriter->endElement();
        }
        $indexwriter->endElement();
        $indexwriter->endDocument();
    }
}