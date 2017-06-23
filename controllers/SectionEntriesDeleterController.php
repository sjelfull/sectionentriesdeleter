<?php
/**
 * Section Entries Deleter plugin for Craft CMS
 *
 * SectionEntriesDeleter Controller
 *
 * --snip--
 * Generally speaking, controllers are the middlemen between the front end of the CP/website and your plugin’s
 * services. They contain action methods which handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering post data, saving it on a model,
 * passing the model off to a service, and then responding to the request appropriately depending on the service
 * method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what the method does (for example,
 * actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 * --snip--
 *
 * @author    Fred Carlsen
 * @copyright Copyright (c) 2016 Fred Carlsen
 * @link      http://sjelfull.no
 * @package   SectionEntriesDeleter
 * @since     1.0.0
 */

namespace Craft;

class SectionEntriesDeleterController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array(
        'actionIndex',
    );

    /**
     * Handle a request going to our plugin's index action URL, e.g.: actions/sectionEntriesDeleter
     */
    public function actionIndex ()
    {
        $sections = craft()->sections->getAllSections();
        $sections = craft()->sections->getEditableSections();

        $this->renderTemplate('sectionentriesdeleter/List', array(
            'sections' => $sections,
        ));
    }

    public function actionDelete ()
    {
        $sectionId = craft()->request->getRequiredParam('id');

        $elementIds = craft()->db->createCommand()
                                 ->select('id')
                                 ->from('entries')
                                 ->where('sectionId = :sectionId', array( ':sectionId' => $sectionId ))
                                 ->queryColumn();

        $rowsAffected = craft()->db->createCommand()
                                   ->delete(
                                       'elements',
                                       array( 'in', 'id', $elementIds )
                                   );

        return $this->redirect('sectionentriesdeleter');

    }
}