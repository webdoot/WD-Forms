<div class="wrap">
<h1>Admin Setting</h1>

<form method="post" action="options.php">
	<input type="hidden" name="option_page" value="reading"><input type="hidden" name="action" value="update">
	<input type="hidden" id="_wpnonce" name="_wpnonce" value="45db05b481"><input type="hidden" name="_wp_http_referer" value="/school/wp-admin/options-reading.php">
	<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row">Your homepage displays</th>
				<td id="front-static-pages">
					<fieldset>
						<legend class="screen-reader-text"><span>Your homepage displays</span></legend> 
						<p><label><input name="show_on_front" type="radio" value="posts" class="tog">
		Your latest posts</label></p>
						<p><label><input name="show_on_front" type="radio" value="page" class="tog" checked="checked">
		A <a href="edit.php?post_type=page">static page</a> (select below)	</label></p>
						<ul>
							<li><label for="page_on_front">
							Homepage: <select name="page_on_front" id="page_on_front">
							<option value="0">— Select —</option>
							<option class="level-0" value="2" selected="selected">Sample Page</option>
						</select>
						</label></li>
							<li><label for="page_for_posts">
							Posts page: <select name="page_for_posts" id="page_for_posts">
							<option value="0">— Select —</option>
							<option class="level-0" value="2">Sample Page</option>
						</select>
						</label></li>
						</ul>
						</fieldset>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="posts_per_page">Blog pages show at most</label></th>
					<td>
						<input name="posts_per_page" type="number" step="1" min="1" id="posts_per_page" value="10" class="small-text"> posts
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="posts_per_rss">Syndication feeds show the most recent</label></th>
					<td><input name="posts_per_rss" type="number" step="1" min="1" id="posts_per_rss" value="10" class="small-text"> items</td>
				</tr>
				<tr>
				<th scope="row">For each post in a feed, include </th>
				<td><fieldset><legend class="screen-reader-text"><span>For each post in a feed, include </span></legend>
					<p>
						<label><input name="rss_use_excerpt" type="radio" value="0" checked="checked"> Full text</label><br>
						<label><input name="rss_use_excerpt" type="radio" value="1"> Summary</label>
					</p>
					<p class="description">
						Your theme determines how content is displayed in browsers. <a href="https://wordpress.org/support/article/wordpress-feeds/">Learn more about feeds</a>.	</p>
				</fieldset></td>
				</tr>

				<tr class="option-site-visibility">
					<th scope="row">Search Engine Visibility </th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span>Search Engine Visibility </span></legend>
							<label for="blog_public"><input name="blog_public" type="checkbox" id="blog_public" value="0">
						Discourage search engines from indexing this site</label>
							<p class="description">It is up to search engines to honor this request.</p>
						</fieldset>
					</td>
				</tr>

		</tbody>
	</table>
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
</form>
</div>