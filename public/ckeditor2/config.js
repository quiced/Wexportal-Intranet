/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    config.language = 'cs';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/public/ckeditor/kcfinder/browse.php?type=files/public';
    config.filebrowserImageBrowseUrl = '/public/ckeditor/kcfinder/browse.php?type=images/public';
    config.filebrowserFlashBrowseUrl = '/public/ckeditor/kcfinder/browse.php?type=flash/public';
    config.filebrowserUploadUrl = '/public/ckeditor/kcfinder/upload.php?type=files/public';
    config.filebrowserImageUploadUrl = '/public/ckeditor/kcfinder/upload.php?type=images&dir=images/public';
    config.filebrowserFlashUploadUrl = '/public/ckeditor/kcfinder/upload.php?type=flash&dir=flash/public';
    ;
};