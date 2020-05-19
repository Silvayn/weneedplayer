<section id="ads">
    
    <?php if($annonce == false): ?>
    
    <div class="notFound d-flex justify-content-center align-items-center" id="main">
    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
    <div class="inline-block align-middle">
        <h2 class="font-weight-normal lead" id="desc">La page que vous avez demandée n'a pas été trouvée.</h2>
    </div>
    </div>

    <?php else: ?>
<article>
        <div class="container detail-annonce">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <p class="text-muted d-flex flex-row justify-content-center align-items-center"><?php echo $annonce['category']; ?></p>
                <h1><?php echo $annonce['title']; ?></h1>
                <p><?php echo $annonce['contenu']; ?></p>
                <div class="text-muted d-flex flex-row justify-content-around">
                    <p class="ads-ligue"><?php echo $annonce['ligue']; ?></p>
                    <p class="ads-skill"><?php echo $annonce['skill']; ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 ads-infos d-flex flex-column justify-content-center align-items-center">
                <div class="detail-ads d-flex flex-row justify-content-center align-items-center">
                    <?php if($annonce['photo'] != null || $annonce['photo'] != ''): ?>
                        <img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/' . $annonce['photo']; ?>">
                    <?php else: ?>
                        <img class="ads-img" src="<?php echo RACINE_IMG_UPLOADS . 'users/user-icon.png'; ?>">
                    <?php endif; ?>
                <span class="ads-user"><?php echo ucfirst($annonce['user']); ?></span>
                </div>
                <i class="text-muted ads-online"><?php echo $count; ?> annonce(s) en ligne</i>
                <p></p>
                <div class="detail-ads d-flex flex-column justify-content-center align-items-center">
                    <a href="tel:<?php echo $annonce['phone']; ?>"><button type="button" class="btn action_button btn-lg btn-block"><?php echo $annonce['phone'] ?></button></a>
                    <p></p>
                    <a href="mailto:<?php echo $annonce['mail']; ?>"><button type="button" class="btn action_button btn-lg btn-block"><?php echo $annonce['mail'] ?></button></a>
                </div>
            </div>
        </div>
    </div>
    </article>
    
    <!-- COMMENTS -->
    <div class="container-fluid comments">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="blog-comment">
                <h3 class="text-left">Commentaires</h3>
                <span class="comment-border text-left"></span>
                <?php if($this->request->hasFlash('errors')): ?>
                <?php foreach ($this->request->getFlash('errors') as $errors): ?>
                    <div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> <?php echo $errors; ?></div>
                <?php endforeach; ?>
                <?php endif; ?>
                <hr/>
                <ul class="comments">
                    <?php foreach ($comments as $comment): ?>
                    <li class="clearfix" id="comment-<?php echo $comment->getId(); ?>">
                        <img class="avatar" src="<?php echo RACINE_IMG_UPLOADS . 'users/user-icon.png'; ?>">
                        <div class="post-comments">
                            <p class="meta"><?php echo ucwords($comment->getFrenchDate($comment->getDatec())); ?> <?php echo ucfirst($comment->getUser()); ?> dit : 
                                <i class="pull-right"><button class="reply btn btn-info"  data-id="<?php echo $comment->getId(); ?>" style="float: right;"><small>Répondre</small></button></i>
                            </p>
                            <span class="comment-box-border text-left"></span>
                              <p><?php echo $comment->getContent(); ?></p>
                        </div>
                        <ul class="comments">
                        <?php if(isset($comment->children)): ?>
                            <?php foreach ($comment->children as $comment): ?>
                            <li class="clearfix" id="comment-<?php echo $comment->getId(); ?>">
                                <img class="avatar" src="<?php echo RACINE_IMG_UPLOADS . 'users/user-icon.png'; ?>">
                              <div class="post-comments">
                                  <p class="meta"><?php echo ucwords($comment->getFrenchDate($comment->getDatec())); ?> <?php echo ucfirst($comment->getUser()); ?> dit : 
                                      <?php if($comment->getDepth() > 1): ?>
                                      <i class="text-right pull-right"><button data-id="<?php echo $comment->getId(); ?>" class="reply btn btn-info" style="float: right;"><small>Répondre</small></button></i>
                                      <?php endif; ?>
                                  </p>
                                  <p><?php echo $comment->getContent(); ?></p>
                              </div>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <form id="form-comment" action="" method="post">
            <input type="hidden" name="parent" value="0" id="parent">
            <input type="hidden" name="annonce" value="<?php echo $annonce['id']; ?>">
            <div class="form-group d-flex flex-row justify-content-center">
                <textarea class="form-control" name="content" placeholder="Dépose ton commentaire" required></textarea>
            </div>
            <button type="submit" class="btn btn-info" style="float: right;">Post</button>
        </form>
    </div>
<?php endif; ?>
</section>

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">   
</script>
<script>window.jQuery || document.write('<script src="<?php echo RACINE_JS . 'jquery.js'; ?>"><\/script>');</script>

<script>
    jQuery(document).ready(function($){
        $('.reply').click(function(e){
            e.preventDefault();
            var $form = $('#form-comment');
            var $this = $(this);
            var parent = $this.data('id');
            var $comment = $('#comment-' + parent);
            
            $('#parent').val(parent);
            $comment.after($form);
        });
    });
</script>
