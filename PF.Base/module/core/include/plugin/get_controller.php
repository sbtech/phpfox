<?php

if (!empty($_POST) && isset($_POST['id']) && Phpfox::isModule('feed') && Phpfox::getParam('feed.cache_each_feed_entry') && !PHPFOX_IS_AJAX)
{
	$oReq = Phpfox_Request::instance();
	$oDb = Phpfox_Database::instance();
	
		$sCustomCurrentUrl = Phpfox_Module::instance()->getFullControllerName();
		$aVals = $oReq->getArray('val');		
		if (!empty($aVals))
		{
			switch ($sCustomCurrentUrl)
			{
				case 'blog.add':
					Phpfox::getService('feed.process')->clearCache('blog', $_POST['id']);
					break;
				case 'pages.add':
					Phpfox::getService('feed.process')->clearCache('pages_itemLiked', $_POST['id']);
					break;					
				case 'blog.delete':
					Phpfox::getService('feed.process')->clearCache('blog', $oReq->get('id'));
					break;
			}
		}
	
}

?>