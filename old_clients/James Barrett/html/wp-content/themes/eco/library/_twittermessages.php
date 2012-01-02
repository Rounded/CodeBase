<?php if(function_exists('twitter_messages') && pagelines('twittername')):?>
<span class="twitter">
	 "<?php twitter_messages(pagelines('twittername'), 1, false, false, '', false, false, false); ?>" &mdash;&nbsp;<a class="twitteraccount" href="http://www.twitter.com/<?php echo pagelines('twittername');?>"><?php echo pagelines('twittername');?></a>
</span>
<?php endif;?>