<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
  $layout = _nikadevs_cms_active_layout(array('page' => $page));
?>

<div class="site-wrapper">

  <header class="header header-fixed">
    <div class="header-main">
      <div class="container">

        <!-- Logo -->
        <div class="logo logo-sticky">
          <!-- <a href="index.html"><img src="images/logo.png" alt="Stability"></a> -->
          <h1><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h1>
          <p class="tagline"><?php print $site_slogan; ?></p>
        </div>
        <!-- Logo / End -->

        <button type="button" class="navbar-toggle">
          <i class="fa fa-bars"></i>
        </button>

          <!-- Navigation -->
        <nav class="nav-main nav">
          <ul data-breakpoint="992" class="flexnav">
           <?php 
              foreach($layout['rows'] as $row) {
                if($row['name'] != 'None') {
                  print '<li><a href = "#' . $row['attributes']['id'] . '">' . t($row['name']) . '</a></li>';
                }
              }
            ?>
          </ul>
        </nav>
        <!-- Navigation / End -->
        
      </div>
    </div>
  </header>

  <div class="main" role="main">

    <?php print nikadevs_cms_page_layout(array('page' => $page, 'messages' => $messages, 'tabs' => $tabs)); ?>

    <footer class="footer" id="footer">
      <div class="footer-copyright">
        <div class="container">
          <div class="text-center">
            <ul class="social-links social-links__dark">
              <?php if (theme_get_setting('social_links_facebook_enabled')): ?>
                <li><a href="//<?php print theme_get_setting('social_links_facebook_link'); ?>" ><i class="fa fa-facebook"></i></a></li>
              <?php endif; ?>
              <?php if (theme_get_setting('social_links_twitter_enabled')): ?>
                <li><a href="//<?php print theme_get_setting('social_links_twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
              <?php endif; ?>          
              <?php if (theme_get_setting('social_links_instagram_enabled')): ?>
                <li><a href="//<?php print theme_get_setting('social_links_instagram_link'); ?>"><i class="fa fa-instagram"></i></a></li>
              <?php endif; ?>          
              <?php if (theme_get_setting('social_links_linkedin_enabled')): ?>
                <li><a href="//<?php print theme_get_setting('social_links_linkedin_link'); ?>"><i class="fa fa-linkedin"></i></a></li>
              <?php endif; ?>
              <?php if (theme_get_setting('social_links_xing_enabled')): ?>
                <li><a href="//<?php print theme_get_setting('social_links_xing_link'); ?>"><i class="fa fa-xing"></i></a></li>
              <?php endif; ?>
              <?php if (theme_get_setting('social_links_rss_enabled')): ?>
                <li><a href="//<?php print theme_get_setting('social_links_rss_link'); ?>" ><i class="fa fa-rss"></i></a></li>
              <?php endif; ?>
            </ul>
            <?php print t('Copyright') . ' &copy; '. date('Y'); ?>  <a href="#"><?php print strtoupper(variable_get('site_name', 'STABILITY')); ?></a> &nbsp;| &nbsp; <?php print t('All Rights Reserved'); ?>
          </div>
        </div>
      </div>
    </footer>

  </div>
</div>