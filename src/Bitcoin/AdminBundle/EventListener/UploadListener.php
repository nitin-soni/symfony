<?php

namespace Bitcoin\AdminBundle\EventListener;

use Oneup\UploaderBundle\Event\PostPersistEvent;

/**
 * Description of UploadListener
 *
 * @author nitin
 */
class UploadListener {

    public function onUpload(PostPersistEvent $event) {
        $request = $event->getRequest();
        $gallery = $request->get('gallery');
        echo '<pre>'; print_r($request);
    }

}
