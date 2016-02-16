<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Core\Configure;

/**
 * Upload component
 */
class UploadComponent extends Component {

    public function upload_image($data,$identificador) {
        if ($data) {
            $filename = $data['name'];
            $file_tmp_name = $data['tmp_name'];
            $dir = Configure::read('Uploads.fotografias_avatar.path');
            $allowed = array('png', 'jpg', 'jpeg');
            if (!in_array(substr(strrchr($filename, '.'), 1), $allowed)) {
                throw new InternalErrorException("Error Processing Request.", 1);
            } elseif (is_uploaded_file($file_tmp_name)) {
                move_uploaded_file($file_tmp_name, $dir . DS . $identificador);
            }
        }
    }

}
