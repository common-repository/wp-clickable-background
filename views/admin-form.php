<?php

    if( current_user_can( 'edit_users' ) ){
          $customize_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
          $customize_background_url  = add_query_arg( array( 'autofocus' => array( 'control' => 'background_image' ) ), $customize_url );
    ?>
<div class="wrap">
      <h1 class="admin-page-title"><?= esc_html( get_admin_page_title() ); ?></h1>

      <form method="post" action="<?= esc_html( admin_url( 'admin-post.php' ) ); ?>">

            <div class="form-description">
                  This plugin works only when the event click is direct on the element with class specified on field <i>"Element Class"</i> without any other HTML element on top of it,<br/>
                  <b>Please be sure that choosen elemenet is directly clickable.</b>
            </div>

            <table class="form-table">
                  <tbody>
                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-active">
                                          Active/Deactive Click :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-active" 
                                          type="checkbox"
                                          id="wp-clickable-background-active"
                                          <?= ( get_option('wp-clickable-background-active') ? 'checked' : '') ?>
                                          value="1"
                                          class="regular-text" />
                                    <p class="description" id="wp-clickable-background-active-description">
                                          If this is checked the event Click will be active for the background.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-bglink">
                                          Customizing Background Image :
                                    </label>
                              </th>
                              <td>
                              
                                    <a href="<?= admin_url($customize_background_url); ?>" target="_blank">
                                          <button name="wp-clickable-background-bglink" 
                                                type="button"
                                                id="wp-clickable-background-bglink" >
                                                Customizing Background
                                                </button>
                                    </a>
                                    <p class="description" id="wp-clickable-background-bglink-description">
                                          Click the button above to manage your background image.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-class">
                                          Element Class :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-class" 
                                          type="text"
                                          id="wp-clickable-background-class"
                                          value="<?= get_option('wp-clickable-background-class') ? esc_attr( get_option('wp-clickable-background-class') )  : 'custom-background' ?>"
                                          class="regular-text" />
                                    <p class="description" id="wp-clickable-background-class-description">
                                          The class of the element that will trigger the click,<br/>
                                          as default this is 'custom-background', but your website could use differnt element class,<br/>
                                          please inspect your code to find out what class you want to trigger.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-link">
                                          Page Link/URL :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-link" 
                                          type="text"
                                          id="wp-clickable-background-link"
                                          value="<?= esc_url(get_option('wp-clickable-background-link')) ?>"
                                          class="regular-text" />
                                    <p class="description" id="wp-clickable-background-link-description">
                                          The page where you will be redirect.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-new">
                                          Where to open the Link :
                                    </label>
                              </th>
                              <td>
                                    <input name="wp-clickable-background-new" 
                                          type="radio"
                                          id="wp-clickable-background-new-same"
                                          <?= ( get_option('wp-clickable-background-new') == 'same' ? 'checked' : '') ?>
                                          value="same"
                                          class="regular-text" />
                                    <label for="wp-clickable-background-new-same">Same Tab</label><br/>
                                    <input name="wp-clickable-background-new" 
                                          type="radio"
                                          id="wp-clickable-background-new-tab"
                                          <?= ( get_option('wp-clickable-background-new') == 'tab' ? 'checked' : '') ?>
                                          value="tab"
                                          class="regular-text" />
                                    <label for="wp-clickable-background-new-tab">New Tab</label><br/>
                                    <input name="wp-clickable-background-new" 
                                          type="radio"
                                          id="wp-clickable-background-new-window"
                                          <?= ( get_option('wp-clickable-background-new') == 'window' ? 'checked' : '') ?>
                                          value="window"
                                          class="regular-text" />
                                    <label for="wp-clickable-background-new-window">New Window</label><br/>
                                    <p class="description" id="wp-clickable-background-new-description">
                                          Target of the click, the link can be opened in the same tab, in a new tab or in a new window.
                                    </p>
                              </td>
                        </tr>

                        <tr>
                              <th scope="row">
                                    <label for="wp-clickable-background-javascript">
                                          Javascript :
                                    </label>
                              </th>
                              <td>
                                    <textarea name="wp-clickable-background-javascript" 
                                          id="wp-clickable-background-javascript"
                                          class="large-text code"
                                          rows="10"><?= stripslashes(get_option('wp-clickable-background-javascript')) ?></textarea>
                                    <p class="description" id="wp-clickable-background-javascript-description">
                                          Add a custom Javascript to your page, this Javascript code will be added on the footer.
                                    </p>
                              </td>
                        </tr>

                  </tbody>
            </table>

            <div class="form-messages">
                  <?php echo get_option('wp-clickable-background-form-message'); ?>
            </div>

            <?php
                wp_nonce_field( 'wp-clickable-background-settings-save', 'wp-clickable-background-form-message' );
                submit_button();
            ?>
      </form>
</div><!-- .wrap -->
<?php
    }
    else {
    ?>
<p> <?php __("You are not authorized to perform this operation.") ?> </p>
<?php   
    }
