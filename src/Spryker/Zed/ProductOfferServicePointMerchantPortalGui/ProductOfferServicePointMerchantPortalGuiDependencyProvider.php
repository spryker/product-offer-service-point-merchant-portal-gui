<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferServicePointMerchantPortalGui;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductOfferServicePointMerchantPortalGui\Dependency\Facade\ProductOfferServicePointMerchantPortalGuiToServicePointFacadeBridge;
use Spryker\Zed\ProductOfferServicePointMerchantPortalGui\Dependency\Service\ProductOfferServicePointMerchantPortalGuiToUtilEncodingBridge;

/**
 * @method \Spryker\Zed\ProductOfferServicePointMerchantPortalGui\ProductOfferServicePointMerchantPortalGuiConfig getConfig()
 */
class ProductOfferServicePointMerchantPortalGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_SERVICE_POINT = 'FACADE_SERVICE_POINT';

    /**
     * @uses \Spryker\Zed\Twig\Communication\Plugin\Application\TwigApplicationPlugin::SERVICE_TWIG
     *
     * @var string
     */
    public const SERVICE_TWIG = 'twig';

    /**
     * @var string
     */
    public const SERVICE_UTIL_ENCODING = 'SERVICE_UTIL_ENCODING';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addServicePointFacade($container);
        $container = $this->addTwigEnvironment($container);
        $container = $this->addUtilEncodingService($container);

        return $container;
    }

    protected function addServicePointFacade(Container $container): Container
    {
        $container->set(static::FACADE_SERVICE_POINT, function (Container $container) {
            return new ProductOfferServicePointMerchantPortalGuiToServicePointFacadeBridge(
                $container->getLocator()->servicePoint()->facade(),
            );
        });

        return $container;
    }

    protected function addTwigEnvironment(Container $container): Container
    {
        $container->set(static::SERVICE_TWIG, function (Container $container) {
            return $container->getApplicationService(static::SERVICE_TWIG);
        });

        return $container;
    }

    protected function addUtilEncodingService(Container $container): Container
    {
        $container->set(static::SERVICE_UTIL_ENCODING, function (Container $container) {
            return new ProductOfferServicePointMerchantPortalGuiToUtilEncodingBridge(
                $container->getLocator()->utilEncoding()->service(),
            );
        });

        return $container;
    }
}
