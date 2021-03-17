<?php
/**
* Plugin Name:       Scroll Cat (Meow Edition)
* Plugin URI:        TBD
* Description:       To the top of the page right MEOW!
* Version:           1
* Author:            A Human
* Author URI:        https://www.jakestechspace.com/
* License:           GPLv2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* 
* Cat photo by Alvan Nee on Unsplash
* https://unsplash.com/@alvannee
*
* THIS PLUGIN NOT MADE BY CATS (meow)
*/

if(!defined('ABSPATH')) {
  exit;
}

if (!class_exists( 'Scroll_Cat_Meow_Edition')) {

  class Scroll_Cat_Meow_Edition {

    public function __construct() {
      add_action('wp_enqueue_scripts', array( $this, 'load_cat_scripts'));
      add_action('wp_head', array($this, 'add_cat_styles'));
      add_action('wp_footer', array( $this, 'add_cat'));
    }

    public function load_cat_scripts() {
      wp_enqueue_script( 'Scroll_Cat_Meow_Edition_scripts', plugin_dir_url( __FILE__ ) . 'public/js/catScripts.min.js', false, '', true );
    }

    public function add_cat_styles() {
      $css = "
        #scroll-cat-meow {
          display: none;
          width: 100px;
          height: auto;
          position: fixed;
          right: 2%;
          bottom: 2%;
          cursor: pointer;
          z-index: 9;
        }
        
        @media (max-width: 600px) {
          #scroll-cat-meow {
            width: 55px;
            bottom: 1%;
          }
        }
      ";
      echo "<style>" . $css . "</style>";
    }
    

    public function add_cat() {
      $src =  plugin_dir_url( __FILE__ ) . 'public/images/cat.png';
      $alt = 'To the top of the page right MEOW!';
      echo <<<EOL
        <div id="scroll-cat-meow">
          <img src="$src" alt="$alt" />
        </div>
      EOL;
    }
  }
  new Scroll_Cat_Meow_Edition();
}