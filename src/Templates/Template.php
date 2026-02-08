<?php declare(strict_types = 1);

namespace Contributte\Invoice\Templates;

use Contributte\Invoice\Data\IOrder;
use Contributte\Invoice\Templates\Template\TemplateObject;
use LogicException;
use WebChemistry\SvgPdf\PdfSvg;

abstract class Template implements ITemplate
{

	public function __construct(
		private PdfSvg $renderer,
	)
	{
	}

	public function getRenderer(): PdfSvg
	{
		return $this->renderer;
	}

	public function renderToPdf(IOrder $order): string
	{
		return $this->renderTemplate($order);
	}

	public function renderToSvg(IOrder $order): string
	{
		ob_start();

		$template = $this->createTemplateObject($order); // phpcs:ignore SlevomatCodingStandard.Variables.UnusedVariable.UnusedVariable
		require $this->getTemplate();

		$content = ob_get_clean();

		if ($content === false) {
			throw new LogicException(sprintf('Cannot get content from template %s', $this->getTemplate()));
		}

		return $content;
	}

	abstract protected function getTemplate(): string;

	abstract protected function createTemplateObject(IOrder $order): TemplateObject;

	protected function renderTemplate(IOrder $order): string
	{
		return $this->renderer->toPdf($this->renderToSvg($order))->toString();
	}

}
