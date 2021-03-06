<?php
/**
 * @version     1.0.2
 * @package     com_stories
 * @copyright   Copyright (C) DigiOz Multimedia, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DigiOz Multimedia <webmaster@gmail.com> - http://www.digioz.com
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_stories', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_stories');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_stories')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_TITLE'); ?>:
			<?php echo $this->item->title; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_AUTHOR'); ?>:
			<?php echo $this->item->author; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_COAUTHORS'); ?>:
			<?php echo $this->item->coauthors; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_SUMMARY'); ?>:
			<?php echo $this->item->summary; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_NOTES'); ?>:
			<?php echo $this->item->notes; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_CATEGORIES'); ?>:
			<?php echo $this->item->categories; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_SUBCATEGORIES'); ?>:
			<?php echo $this->item->subcategories; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_WARNINGS'); ?>:
			<?php echo $this->item->warnings; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_RATING'); ?>:
			<?php echo $this->item->rating; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_CHAPTERTITLE'); ?>:
			<?php echo $this->item->chaptertitle; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_CHAPTERNOTES'); ?>:
			<?php echo $this->item->chapternotes; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_STORYTEXT'); ?>:
			<?php echo $this->item->storytext; ?></li>
			<li><?php echo JText::_('COM_STORIES_FORM_LBL_STORY_ENDNOTES'); ?>:
			<?php echo $this->item->endnotes; ?></li>


        </ul>

    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_stories&task=story.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_STORIES_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_stories')):
								?>
									<a href="javascript:document.getElementById('form-story-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_STORIES_DELETE_ITEM"); ?></a>
									<form id="form-story-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_stories&task=story.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="option" value="com_stories" />
										<input type="hidden" name="task" value="story.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_STORIES_ITEM_NOT_LOADED');
endif;
?>
