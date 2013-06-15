<?php
/**
 * Highwind Hooks
 * Action hooks used in the Highwind theme
 * @package highwind
 * @since 1.0
 */


/**
 * Highwind before html action
 * @since 1.0
 */
function highwind_html_before() {
    do_action( 'highwind_html_before' );
    tha_html_before();
}


/**
 * Highwind body top action
 * @since 1.0
 */
function highwind_body_top() {
    do_action( 'highwind_body_top' );
    tha_body_top();
}


/**
 * Highwind body bottom action
 * @since 1.0
 */
function highwind_body_bottom() {
    do_action( 'highwind_body_bottom' );
    tha_body_bottom();
}


/**
 * Highwind head top action
 * @since 1.0
 */
function highwind_head_top() {
    do_action( 'highwind_head_top' );
    tha_head_top();
}


/**
 * Highwind head bottom action
 * @since 1.0
 */
function highwind_head_bottom() {
    do_action( 'highwind_head_top' );
    tha_head_bottom();
}


/**
 * Highwind before header wrapper action
 * @since 1.0
 */
function highwind_header_before() {
    do_action( 'highwind_header_before' );
    tha_header_before();
}


/**
 * Highwind after header wrapper action
 * @since 1.0
 */
function highwind_header_after() {
    do_action( 'highwind_header_after' );
    tha_header_after();
}


/**
 * Highwind header action
 * @since 1.0
 */
function highwind_header() {
	tha_header_top();
    do_action( 'highwind_header' );
    tha_header_bottom();
}


/**
 * Highwind before content wrapper action
 * @since 1.0
 */
function highwind_content_before() {
    do_action( 'highwind_content_before' );
    tha_content_before();
}


/**
 * Highwind after content wrapper action
 * @since 1.0
 */
function highwind_content_after() {
    do_action( 'highwind_content_after' );
    tha_content_after();
}


/**
 * Highwind before content action
 * @since 1.0
 */
function highwind_content_top() {
    do_action( 'highwind_content_top' );
    tha_content_top();
}


/**
 * Highwind after content action
 * @since 1.0
 */
function highwind_content_bottom() {
    do_action( 'highwind_content_bottom' );
    tha_content_bottom();
}


/**
 * Highwind content header top action
 * @since 1.0
 */
function highwind_content_header_top() {
    do_action( 'highwind_content_header_top' );
}


/**
 * Highwind content header bottom action
 * @since 1.0
 */
function highwind_content_header_bottom() {
    do_action( 'highwind_content_header_bottom' );
}


/**
 * Highwind content entry top action
 * @since 1.0
 */
function highwind_content_entry_top() {
    do_action( 'highwind_content_entry_top' );
}


/**
 * Highwind content entry bottom action
 * @since 1.0
 */
function highwind_content_entry_bottom() {
    do_action( 'highwind_content_entry_bottom' );
}


/**
 * Highwind before entry wrapper action
 * @since 1.0
 */
function highwind_entry_before() {
    do_action( 'highwind_entry_before' );
    tha_entry_before();
}


/**
 * Highwind after entry wrapper action
 * @since 1.0
 */
function highwind_entry_after() {
    do_action( 'highwind_entry_after' );
    tha_entry_after();
}


/**
 * Highwind entry top action
 * @since 1.0
 */
function highwind_entry_top() {
    do_action( 'highwind_entry_top' );
    tha_entry_top();
}


/**
 * Highwind entry bottom action
 * @since 1.0
 */
function highwind_entry_bottom() {
    do_action( 'highwind_entry_bottom' );
    tha_entry_bottom();
}


/**
 * Highwind before comments action
 * @since 1.0
 */
function highwind_comments_before() {
    do_action( 'highwind_comments_before' );
    tha_comments_before();
}


/**
 * Highwind after comments wrapper action
 * @since 1.0
 */
function highwind_comments_after() {
    do_action( 'highwind_comments_after' );
    tha_comments_after();
}


/**
 * Highwind before sidebar action
 * @since 1.0
 */
function highwind_sidebar_before() {
    do_action( 'highwind_sidebar_before' );
    tha_sidebars_before();
}


/**
 * Highwind after sidebar wrapper action
 * @since 1.0
 */
function highwind_sidebar_after() {
    do_action( 'highwind_sidebar_after' );
    tha_sidebars_after();
}


/**
 * Highwind sidebar top
 * @since 1.0
 */
function highwind_sidebar_top() {
    do_action( 'highwind_sidebar_top' );
    tha_sidebar_top();
}


/**
 * Highwind sidebar bottom
 * @since 1.0
 */
function highwind_sidebar_bottom() {
    do_action( 'highwind_sidebar_bottom' );
    tha_sidebar_bottom();
}


/**
 * Highwind before footer wrapper action
 * @since 1.0
 */
function highwind_footer_before() {
    do_action( 'highwind_footer_before' );
    tha_footer_before();
}


/**
 * Highwind after footer wrapper action
 * @since 1.0
 */
function highwind_footer_after() {
    do_action( 'highwind_footer_after' );
    tha_footer_after();
}


/**
 * Highwind footer action
 * @since 1.0
 */
function highwind_footer() {
	tha_footer_top();
    do_action( 'highwind_footer' );
    tha_footer_bottom();
}