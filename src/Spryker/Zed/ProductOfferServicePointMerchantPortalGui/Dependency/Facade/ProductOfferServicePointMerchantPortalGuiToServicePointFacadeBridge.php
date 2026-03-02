<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferServicePointMerchantPortalGui\Dependency\Facade;

use Generated\Shared\Transfer\ServiceCollectionTransfer;
use Generated\Shared\Transfer\ServiceCriteriaTransfer;
use Generated\Shared\Transfer\ServicePointCollectionTransfer;
use Generated\Shared\Transfer\ServicePointCriteriaTransfer;

class ProductOfferServicePointMerchantPortalGuiToServicePointFacadeBridge implements ProductOfferServicePointMerchantPortalGuiToServicePointFacadeInterface
{
    /**
     * @var \Spryker\Zed\ServicePoint\Business\ServicePointFacadeInterface
     */
    protected $servicePointFacade;

    /**
     * @param \Spryker\Zed\ServicePoint\Business\ServicePointFacadeInterface $servicePointFacade
     */
    public function __construct($servicePointFacade)
    {
        $this->servicePointFacade = $servicePointFacade;
    }

    public function getServicePointCollection(ServicePointCriteriaTransfer $servicePointCriteriaTransfer): ServicePointCollectionTransfer
    {
        return $this->servicePointFacade->getServicePointCollection($servicePointCriteriaTransfer);
    }

    public function getServiceCollection(
        ServiceCriteriaTransfer $serviceCriteriaTransfer
    ): ServiceCollectionTransfer {
        return $this->servicePointFacade->getServiceCollection($serviceCriteriaTransfer);
    }
}
