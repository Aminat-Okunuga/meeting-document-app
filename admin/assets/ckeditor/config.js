/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    var url = "asset/ckeditor/";
    config.filebrowserBrowseUrl = url+'kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = url+'kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = url+'kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = url+'kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = url+'kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = url+'kcfinder/upload.php?opener=ckeditor&type=flash';
};
