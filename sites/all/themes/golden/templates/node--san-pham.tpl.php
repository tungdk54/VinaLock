<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1787038674642801',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php
  //Lấy url bài viết
  $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      // print render($content);
    ?>
    <?php if (isset($node->title)): ?>
      <div class="san-pham row">
        <div class="anh-dai-dien col-xs-12 col-sm-6">
          <a class="image"><img typeof="foaf:Image" src="/sites/default/files/<?php if(isset($node->field_anh_dai_dien['und'][0]['uri'])) print substr($node->field_anh_dai_dien['und'][0]['uri'], 9); ?>"></a>
        </div>
        <div class="product-summary col-xs-12 col-sm-6">
          <table class="table table-bordered table-striped">
            <tbody>
              <tr>
                <th>Mã sản phẩm</th>
                <td><?php if(isset($node->field_ma_san_pham['und'][0]['value'])) print $node->field_ma_san_pham['und'][0]['value']; ?></td>
              </tr>
              <tr>
                <th>Loại sản phẩm</th>
                <td><?php if(isset($node->field_loai_san_pham['und'][0]['tid'])) {$loai_san_pham = taxonomy_term_load((int)$node->field_loai_san_pham['und'][0]['tid']); print $loai_san_pham->name;} ?></td>
              </tr>
              <tr>
                <th>Thương hiệu</th>
                <td><?php if(isset($node->field_thuong_hieu['und'][0]['tid'])) {$ten_thuong_hieu = taxonomy_term_load((int)$node->field_thuong_hieu['und'][0]['tid']); }; print $ten_thuong_hieu->name; ?></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="product-price  col-xs-12 col-sm-6 form-group">
          <div class="sale">
            <span class="number"><?php if(isset($node->field_gia_khuyen_mai['und'][0]['value'])) print number_format((int)$node->field_gia_khuyen_mai['und'][0]['value'],0,",","."); ?></span>
          </div>
          <div class="price">
            <span>Giá niêm yết: </span><span class="number"><?php print number_format((int)$node->field_gia['und'][0]['value'],0,",","."); ?> </span>VND
          </div>
        </div>

        <div class="facebook-social text-right col-xs-12 col-sm-6">
          <div class="fb-send" data-href="<?php $url ?>"></div>
            <div class="fb-like" data-href="<?php $url ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>

        <div class="product-details col-xs-12">
          <?php if(isset($node->body['und'][0]['value'])) print $node->body['und'][0]['value']; ?>
        </div>
      </div>

      <div class="facebook-comment form-group">
        <div class="fb-comments" data-width="100%" data-height="320" data-href="<?php $url ?>" data-numposts="5" data-colorscheme="light" data-mobile=""></div>
      </div>

      <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">              
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <img src="" class="imagepreview" style="width: 100%;" >
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
