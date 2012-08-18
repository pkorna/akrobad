<div class="control-group"><div class="controls"><div id="wmd-button-bar"></div></div></div>

<?php echo $this->UI->input('markdown', array('label' => __('Treść'), 'id' => 'wmd-input', 'class' => 'wmd-input'));?>

<?php echo $this->Form->input('content', array('label' => false, 'type' => 'hidden', 'id' => 'convertedcontent'));?>

<div class="control-group"><div class="controls"><div id="wmd-preview" class="wmd-preview"></div></div></div>

<script type="text/javascript">
	(function () {
    	var converter1 = Markdown.getSanitizingConverter();
        converter1.hooks.chain("postConversion", function (text) {
        	$("#convertedcontent").val(text);
            return text;
        });
        var editor1 = new Markdown.Editor(converter1);
        editor1.run();
    })();
</script>