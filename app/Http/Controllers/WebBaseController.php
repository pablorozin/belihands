<?php

namespace App\Http\Controllers;

class WebBaseController extends Controller
{
    public $purifyConfig = [
        'HTML.Allowed' => 'h1,h2,h3,h4,h5,h6,iframe[src|width|height|class|frameborder],blockquote,div,b,strong,i,em,sup,sub,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
        'URI.SafeIframeRegexp' => '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/|api.soundcloud.com/tracks/)%',
        'HTML.Doctype' => 'XHTML 1.0 Transitional',
        'HTML.SafeIframe' => true,
        'AutoFormat.AutoParagraph' => true,
        'AutoFormat.RemoveEmpty' => true,
    ];

    public function __construct()
    {
        /*
        $purifier = Purify::getPurifier();
        
        $config = $purifier->config;

        $config->set('HTML.DefinitionID', 'tinymce-editor');
        $config->set('HTML.DefinitionRev', 1);
        $config->set('HTML.Allowed', 'h1,h2,h3,h4,h5,h6,iframe[src|width|height|class|frameborder],blockquote,div,b,strong,i,em,sup,sub,a[href|title|target],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
        $config->set('URI.SafeIframeRegexp', '%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/|api.soundcloud.com/tracks/)%');
        $config->set('HTML.Doctype', 'XHTML 1.0 Transitional');
        $config->set('HTML.SafeIframe', true);
        $config->set('AutoFormat.AutoParagraph', true);
        $config->set('AutoFormat.RemoveEmpty', true);
        $config->set('Attr.AllowedFrameTargets', ['_blank','_self','']);

        $purifier->config = $config;
        */
    }

    public function getData() {
        return get_object_vars($this);
    }
}