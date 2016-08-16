<?php
namespace Concrete\Core\Page\Search\Field;

use Concrete\Core\Attribute\Category\PageCategory;
use Concrete\Core\Page\Search\Field\Field\DateAddedField;
use Concrete\Core\Page\Search\Field\Field\DateLastModifiedField;
use Concrete\Core\Page\Search\Field\Field\DatePublicField;
use Concrete\Core\Page\Search\Field\Field\NumberOfChildrenField;
use Concrete\Core\Page\Search\Field\Field\PageTemplateField;
use Concrete\Core\Page\Search\Field\Field\PageTypeField;
use Concrete\Core\Page\Search\Field\Field\ParentPageField;
use Concrete\Core\Page\Search\Field\Field\PermissionsInheritanceField;
use Concrete\Core\Page\Search\Field\Field\ThemeField;
use Concrete\Core\Page\Search\Field\Field\VersionStatusField;
use Concrete\Core\Search\Field\AttributeKeyField;
use Concrete\Core\Search\Field\Field\KeywordsField;
use Concrete\Core\Page\Search\Field\Field\PageOwnerField;
use Concrete\Core\Search\Field\Manager as FieldManager;

class Manager extends FieldManager
{

    protected $fileCategory;

    public function __construct(PageCategory $fileCategory)
    {
        $this->fileCategory = $fileCategory;
        $this->addGroup(t('Core Properties'), [
            new KeywordsField(),
            new PageTypeField(),
            new ParentPageField(),
            new PageOwnerField(),
            new DateAddedField(),
            new NumberOfChildrenField(),
            new PageTemplateField(),
            new ThemeField(),
            new VersionStatusField(),
            new PermissionsInheritanceField(),
            new DateLastModifiedField(),
            new DatePublicField()
        ]);
        $attributes = [];
        foreach($fileCategory->getSearchableList() as $key) {
            $field = new AttributeKeyField($key);
            $attributes[] = $field;
        }
        $this->addGroup(t('Custom Attributes'), $attributes);

    }


}
