<!-- Modal -->
<div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="mui mui2 muis modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary w-100 text-center" id="subscriptionModalLabel">
          Don't miss any new update!
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0">
        <p class="text-center"><i class="f100 text-secondary far fa-envelope-open"></i></p>
        <i class="text-center d-block">Subscribe now! to get the latest tutorials, codes, mcqs, interview questions updates in your email.</i>
        <?php echo do_shortcode('[yikes-mailchimp form="1"]'); ?>
      </div>
    </div>
  </div>
</div>