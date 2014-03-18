<?php

return array(
	// regular form definitions
	'prep_value'                 => true,
	'auto_id'                    => true,
	'auto_id_prefix'             => 'form_',
	'form_method'                => 'post',
	'form_template'              => "\n{open}\n{fields}\n{close}\n",
    
	'field_template'             => "<div class=\"{error_class} form-group\">
            \n{label}{required}
               \n{field} <span>{description}</span> {error_msg}
            \n</div>",
    
	'multi_field_template'       => "<div class=\"{error_class} form-group\">
            \n{group_label}{required}
            \n{fields}{field} {label}<br />\n{fields}<span>{description}</span>{error_msg}
            \n</div>",
	'error_template'             => '<span>{error_msg}</span>',
	'group_label'	             => '{label}',
	'required_mark'              => '',
	'inline_errors'              => false,
	'error_class'                => null,
	'label_class'                => '',

	// tabular form definitions
	'tabular_form_template'      => "<table>{fields}</table>\n",
	'tabular_field_template'     => "{field}",
	'tabular_row_template'       => "<tr>{fields}</tr>\n",
	'tabular_row_field_template' => "\t\t\t<td>{label}{required}&nbsp;{field} {error_msg}</td>\n",
	'tabular_delete_label'       => "Delete?",
);