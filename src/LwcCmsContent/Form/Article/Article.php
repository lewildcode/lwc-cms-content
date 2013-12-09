<?php
namespace LwcCmsContent\Form\Article;

use LwcCmsContent\Form\AbstractContentForm;

class Article extends AbstractContentForm
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->add($this->getHeaderText());
        $this->add($this->getHeaderWeight());
        $this->add($this->getHeaderByline());
        $this->add($this->getHeaderLink());
        $this->add($this->getImagePath());
        $this->add($this->getImageTitle());
        $this->add($this->getImageLink());
        $this->add($this->getImageClasses());
        $this->add($this->getBody());
    }
    
    /**
     *
     * @return array
     */
    public function getImageTitle()
    {
        return array(
            'name' => 'image_title',
            'options' => array(
                'label' => 'Image title',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'maxlength' => 100,
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getImagePath()
    {
        return array(
            'name' => 'image_path',
            'options' => array(
                'label' => 'Image path',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'maxlength' => 100,
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getImageClasses()
    {
        return array(
            'name' => 'image_classes',
            'options' => array(
                'label' => 'Image CSS classes',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'maxlength' => 50,
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getImageLink()
    {
        return array(
            'name' => 'image_link',
            'options' => array(
                'label' => 'Image link',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'type' => 'url',
                'maxlength' => 100,
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getHeaderText()
    {
        return array(
            'name' => 'header_text',
            'options' => array(
                'label' => 'Header text',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control'
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getHeaderByline()
    {
        return array(
            'name' => 'header_byline',
            'options' => array(
                'label' => 'Header byline',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'maxlength' => 255,
                'class' => 'form-control'
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getHeaderLink()
    {
        return array(
            'name' => 'header_link',
            'options' => array(
                'label' => 'Header link',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'maxlength' => 100,
                'type' => 'url',
                'class' => 'form-control'
            )
        );
    }
    
    /**
     *
     * @return array
     */
    public function getHeaderWeight()
    {
        return array(
            'name' => 'header_weight',
            'options' => array(
                'label' => 'Header weight (size)',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'placeholder' => 'Value between 1 - 6',
                'min' => 1,
                'max' => 6,
                'required' => 'required',
                'type' => 'number',
                'class' => 'form-control'
            )
        );
    }
    

    /**
     *
     * @return array
     */
    public function getBody()
    {
        return array(
            'name' => 'body',
            'options' => array(
                'label' => 'Content',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'required' => 'required',
                'type' => 'textarea',
                'class' => 'form-control'
            )
        );
    }
}