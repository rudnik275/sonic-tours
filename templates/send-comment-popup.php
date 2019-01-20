<div class="comment_popup_container hidden" id="comment_popup_form">
	<div class="comment_popup">
		<div class="comment_popup_close"></div>
		<form action="<?= get_template_directory_uri() . '/add-comment.php' ?>" onsubmit="sendComment(event)">
			<div class="comment_popup_stars">
				<span>Ratio:</span>
				<fieldset class="starability-basic">
				  <input type="radio" id="no-rate" class="input-no-rate" name="ratio" value="0" aria-label="No rating." />
				  <input type="radio" id="first-rate1" name="ratio" value="1" />
				  <label for="first-rate1" title="Terrible">1 star</label>
				  <input type="radio" id="first-rate2" name="ratio" value="2" />
				  <label for="first-rate2" title="Not good">2 stars</label>
				  <input type="radio" id="first-rate3" name="ratio" value="3" />
				  <label for="first-rate3" title="Average">3 stars</label>
				  <input type="radio" id="first-rate4" name="ratio" value="4" />
				  <label for="first-rate4" title="Very good">4 stars</label>
				  <input type="radio" id="first-rate5" name="ratio" value="5" checked/>
				  <label for="first-rate5" title="Amazing">5 stars</label>
				</fieldset>
			</div>
			<input class="comment_popup_input" required type="text" name="author" placeholder="Your name">
			<textarea class="comment_popup_input" rows="5" required name="text" placeholder="Your emotions"></textarea>
			<div class="comment_popup_file">
				<span>Photos:</span>
				<input type="file" multiple name="photos">
			</div>
			<button class="btn comment_popup_btn_submit" type="submit">Send</button>
		</form>
	</div>
</div>

<div class="comment_popup_container hidden" id="comment_popup_success">
	<div class="comment_popup">
		<div class="comment_popup_close"></div>
			<div class="comment_popup_response" id="comment_popup_response"></div>
			<button class="btn comment_popup_btn_submit" id="comment_popup_success_btn">Ok</button>
		</form>
	</div>
</div>