<?php
$output = '<div class="amp_pb_module amp_blurb {{css_class}}"><img src="{{blurb_image}}" width="{{img_width}}" height="{{img_height}}" />
<h4>{{text_title}}</h4>
<p>{{text_description}}</p>
</div>'; 

return array(
		'label' =>'Blurb',
		'name' =>'blurb',
		'default_tab'=> 'customizer',
		'tabs' => array(
              'customizer'=>'Customizer',
              'container_css'=>'Container css'
            ),
		'fields'=> array( 
					array(
						'type'		=>'text',
						'name'		=>"text_title",
						'label'		=>"Title",
						'tab'		=>'customizer',
						'default'	=>'Heart Of The Landing Page',
						),
					array(
						'type'		=>'textarea',
						'name'		=>"text_description",
						'label'		=>"Description",
						'tab'		=>'customizer',
						'default'	=>'This is a sample text which is being used for the dummy purpose to avoid confusion.',
						),
					array(
						'type'		=>'upload',
						'name'		=>"blurb_image",
						'label'		=>"Image",
						'tab'		=>'customizer',
						'default'	=>plugins_url('accelerated-mobile-pages/images/150x150.png'),
						),
					array(
						'type'		=>'text',
						'name'		=>"img_width",
						'label'		=>"Image Width",
						'tab'		=>'customizer',
						'default'	=>'80px'
						),
					array(
						'type'		=>'text',
						'name'		=>"img_height",
						'label'		=>"Image Height",
						'tab'		=>'customizer',
						'default'	=>'80px'
						),
				 	array(
                    'type'    => 'text',
                    'name'    => 'css_class',
                    'label'   => 'Custom CSS Class',
                    'tab'		=>'container_css',
                    'default' => ''
						)  
					),
		'front_template'=> $output 
	);
?>