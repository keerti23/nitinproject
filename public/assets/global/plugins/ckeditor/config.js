/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    CKEDITOR.config.extraPlugins = 'wordcount';
    CKEDITOR.config.wordcount = {

        // Whether or not you want to show the Word Count
        showWordCount: false,

        // Whether or not you want to show the Char Count
        showCharCount: true,

        // Whether or not to include Html chars in the Char Count
        countHTML: false,


        countSpacesAsChars: true
    };

    CKEDITOR.config.autoParagraph = false;
    CKEDITOR.config.allowedContent = true;
    //ckeditor settings
    CKEDITOR.config.toolbar = [
        ['Styles','Format','Font','FontSize'],
        '/',
        ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
        '/',
        ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
    ] ;

};
