<?php
declare(strict_types=1);

namespace SimpleSAML\Module\mymodule;

use SimpleSAML\Configuration;
use SimpleSAML\Session;
use Twig\Environment;
use SimpleSAML\XHTML\TemplateControllerInterface;

class VanillaThemeController implements TemplateControllerInterface
{
  /** @var \SimpleSAML\Configuration */
  protected Configuration $themeconfig;

  /**
   * Controller constructor.
   *
   * It initializes the global configuration and auth source configuration for the controllers implemented here.
   *
   * @param \SimpleSAML\Configuration              $config The configuration to use by the controllers.
   * @param \SimpleSAML\Session                    $session The session to use by the controllers.
   *
   * @throws \Exception
   */
  public function __construct(
    protected Configuration $config,
    protected Session $session
  ) {
    $this->themeconfig = Configuration::getConfig('module_themevanilla.php');
  }

  /**
   * Modify the twig environment after its initialization (e.g. add filters or extensions).
   *
   * @param \Twig\Environment $twig The current twig environment.
   * @return void
   */
  public function setUpTwig(Environment &$twig): void
  {
  }

  /**
   * Add, delete or modify the data passed to the template.
   *
   * This method will be called right before displaying the template.
   *
   * @param array $data The current data used by the template.
   * @return void
   */
  public function display(array &$data): void
  {
    $data['config'] = $this->themeconfig;
  }
}
