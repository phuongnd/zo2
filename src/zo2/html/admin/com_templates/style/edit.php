<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
$user = JFactory::getUser();
$canDo = TemplatesHelper::getActions();

if (Zo2Framework::allowOverrideAdminTemplate()) :
?>
<form id="adminForm" action="<?php echo JRoute::_('index.php?option=com_templates&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="style-form" class="form-validate form-horizontal">
	<fieldset id="zo2">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('Overview', true)); ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('title'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('title'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('template'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('template'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('client_id'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('client_id'); ?>
						<input type="text" size="35" value="<?php echo $this->item->client_id == 0 ? JText::_('JSITE') : JText::_('JADMINISTRATOR'); ?>	" class="readonly" readonly="readonly" />
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('home'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('home'); ?>
					</div>
				</div>
				<?php if ($this->item->id) : ?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $this->form->getLabel('id'); ?>
						</div>
						<div class="controls">
							<span class="disabled"><?php echo $this->item->id; ?></span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->item->xml) : ?>
					<?php if ($text = trim($this->item->xml->description)) : ?>
						<div class="control-group">
							<label class="control-label">
								<?php echo JText::_('COM_TEMPLATES_TEMPLATE_DESCRIPTION'); ?>
							</label>
							<div class="controls">
								<span class="disabled"><?php echo JText::_($text); ?></span>
							</div>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<div class="alert alert-error"><?php echo JText::_('COM_TEMPLATES_ERR_XML'); ?></div>
				<?php endif; ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>

			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'options', JText::_('General', true)); ?>
				<?php //get the menu parameters that are automatically set but may be modified.
					echo $this->loadTemplate('options'); ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'fonts', JText::_('Fonts', true)); ?>
            <?php //get the menu parameters that are automatically set but may be modified.
            echo $this->loadTemplate('fonts'); ?>
            <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'theme', JText::_('Preset Styles', true)); ?>
        <?php //get the menu parameters that are automatically set but may be modified.
        echo $this->loadTemplate('themecolors'); ?>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'layoutbuiler', JText::_('Layout Builder', true)); ?>
                <?php echo $this->loadTemplate('layoutbuilder'); ?>
            <?php echo JHtml::_('bootstrap.endTab'); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'megamenu', JText::_('Mega Menu', true)); ?>
                <?php echo $this->loadTemplate('megamenu'); ?>
            <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php if ($user->authorise('core.edit', 'com_menu') && $this->item->client_id == 0):?>
            <?php if ($canDo->get('core.edit.state')) : ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'assignment', JText::_('COM_TEMPLATES_MENUS_ASSIGNMENT', true)); ?>
                    <?php echo $this->loadTemplate('assignment'); ?>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>
        <?php endif;?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'advanced', JText::_('Advanced', true)); ?>
            <?php echo $this->loadTemplate('advanced'); ?>
        <?php echo JHtml::_('bootstrap.endTab'); ?>


		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	</fieldset>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>

<?php else : ?>
<form id="adminForm" action="<?php echo JRoute::_('index.php?option=com_templates&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="style-form" class="form-validate form-horizontal">
    <fieldset>
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('JDETAILS', true)); ?>
        <div class="control-group">
            <div class="control-label">
                <?php echo $this->form->getLabel('title'); ?>
            </div>
            <div class="controls">
                <?php echo $this->form->getInput('title'); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <?php echo $this->form->getLabel('template'); ?>
            </div>
            <div class="controls">
                <?php echo $this->form->getInput('template'); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <?php echo $this->form->getLabel('client_id'); ?>
            </div>
            <div class="controls">
                <?php echo $this->form->getInput('client_id'); ?>
                <input type="text" size="35" value="<?php echo $this->item->client_id == 0 ? JText::_('JSITE') : JText::_('JADMINISTRATOR'); ?>	" class="readonly" readonly="readonly" />
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <?php echo $this->form->getLabel('home'); ?>
            </div>
            <div class="controls">
                <?php echo $this->form->getInput('home'); ?>
            </div>
        </div>
        <?php if ($this->item->id) : ?>
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('id'); ?>
                </div>
                <div class="controls">
                    <span class="disabled"><?php echo $this->item->id; ?></span>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->item->xml) : ?>
            <?php if ($text = trim($this->item->xml->description)) : ?>
                <div class="control-group">
                    <label class="control-label">
                        <?php echo JText::_('COM_TEMPLATES_TEMPLATE_DESCRIPTION'); ?>
                    </label>
                    <div class="controls">
                        <span class="disabled"><?php echo JText::_($text); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="alert alert-error"><?php echo JText::_('COM_TEMPLATES_ERR_XML'); ?></div>
        <?php endif; ?>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'options', JText::_('JOPTIONS', true)); ?>
        <?php //get the menu parameters that are automatically set but may be modified.
        echo $this->loadTemplate('options'); ?>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php if ($user->authorise('core.edit', 'com_menu') && $this->item->client_id == 0):?>
            <?php if ($canDo->get('core.edit.state')) : ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'assignment', JText::_('COM_TEMPLATES_MENUS_ASSIGNMENT', true)); ?>
                <?php echo $this->loadTemplate('assignment'); ?>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>
        <?php endif;?>

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>
    </fieldset>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>
<?php endif; ?>