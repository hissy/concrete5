<?php
namespace Concrete\Core\Package\Item\Manager;

use Concrete\Core\Entity\Package;
use Concrete\Core\Support\Manager as CoreManager;

defined('C5_EXECUTE') or die("Access Denied.");

class Manager extends CoreManager
{

    public function createAuthenticationTypeDriver()
    {
        return new AuthenticationType();
    }

    public function createContentEditorSnippetDriver()
    {
        return new ContentEditorSnippet();
    }

    public function createConversationRatingTypeDriver()
    {
        return new ConversationRatingType();
    }

    public function createJobDriver()
    {
        return new Job();
    }

    public function createPermissionKeyDriver()
    {
        return new PermissionKey();
    }

    public function createWorkflowTypeDriver()
    {
        return new WorkflowType();
    }

    public function createStorageLocationTypeDriver()
    {
        return new StorageLocationType();
    }

    public function createAntispamLibraryDriver()
    {
        return new AntispamLibrary();
    }

    public function createAttributeSetDriver()
    {
        return new AttributeSet();
    }

    public function createCaptchaLibraryDriver()
    {
        return new CaptchaLibrary();
    }

    public function createGroupSetDriver()
    {
        return new GroupSet();
    }

    public function createUserPointActionDriver()
    {
        return new UserPointAction();
    }

    public function createAttributeKeyCategoryDriver()
    {
        return new AttributeKeyCategory();
    }

    public function createPageDriver()
    {
        return new Page();
    }

    public function createPermissionAccessEntityTypeDriver()
    {
        return new PermissionAccessEntityType();
    }

    public function createPermissionKeyCategoryDriver()
    {
        return new PermissionKeyCategory();
    }

    public function createWorkflowProgressCategoryDriver()
    {
        return new WorkflowProgressCategory();
    }

    public function createPageTypePublishTargetTypeDriver()
    {
        return new PageTypePublishTargetType();
    }

    public function createPageTypeComposerControlTypeDriver()
    {
        return new PageTypeComposerControlType();
    }

    public function createPageTypeDriver()
    {
        return new PageType();
    }

    public function createPageTemplateDriver()
    {
        return new PageTemplate();
    }

    public function createMailImporterDriver()
    {
        return new MailImporter();
    }

    public function createAttributeTypeDriver()
    {
        return new AttributeType();
    }

    public function createAttributeKeyDriver()
    {
        return new AttributeKey();
    }

    public function createSinglePageDriver()
    {
        return new SinglePage();
    }

    public function createBlockTypeSetDriver()
    {
        return new BlockTypeSet();
    }

    public function createBlockTypeDriver()
    {
        return new BlockType();
    }

    public function createThemeDriver()
    {
        return new Theme();
    }

    public function getPackageItemCategories()
    {
        $return = array();
        foreach($this->app['config']->get('app.package_items') as $item) {
            $return[] = $this->driver($item);
        }
        return $return;
    }
}
