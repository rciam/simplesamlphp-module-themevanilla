<?php
declare(strict_types=1);

namespace SimpleSAML\Module\themevanilla\Controller;

use SimpleSAML\{Configuration, Logger, Session};
use Twig\Environment;
use SimpleSAML\XHTML\TemplateControllerInterface;

class VanillaThemeController implements TemplateControllerInterface
{
  /** @var \SimpleSAML\Configuration */
  protected Configuration $themeconfig;

  /**
   * @var \SimpleSAML\Logger|string
   * @psalm-var \SimpleSAML\Logger|class-string
   */
  protected $logger = Logger::class;

  /**
   * Controller constructor.
   *
   * It initializes the global configuration and auth source configuration for the controllers implemented here.
   *
   * @throws \Exception
   */
  public function __construct() {
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
    $data['config'] = $this->themeconfig->toArray() ?? [];

    $this->logger::debug(
      __METHOD__ . "::config data:" . var_export($data['config'], true)
    );
  }
}
