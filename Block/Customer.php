<?php

namespace Sift\Snippet\Block;

/**
 * Construct
 *
 */
class Customer extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var \Magento\Framework\Session\SessionManagerInterface
     */
    protected $session;

    /**
     * @var \Sift\Snippet\Helper\Config
     */
    protected $config;

    /**
     * @var \Magento\Framework\Encryption\EncryptorInterface
     */
    protected $encryptor;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Framework\Session\SessionManagerInterface $session
     * @param \Sift\Snippet\Helper\Config $config
     * @param \Magento\Framework\Encryption\EncryptorInterface $encryptor
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Session\SessionManagerInterface $session,
        \Sift\Snippet\Helper\Config $config,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->customerSession = $customerSession;
        $this->session         = $session;
        $this->config          = $config;
        $this->encryptor       = $encryptor;
    }

    /**
     * Get current session id
     *
     * @return null|string sessionId
     */
    public function getSessionId()
    {
        return $this->session->getSessionId();
    }

    /**
     * Get customer session id
     *
     * @return null|string cusomerSessionId
     */
    public function getCustomerSessionId()
    {
        return $this->customerSession->getCustomer()->getId();
    }

    /**
     * Get sift.com user id
     * @return string
     */
    public function getSiftUserId()
    {
        return $this->config->getSiftUserId();
    }

    /**
     * Get sift.com account id
     * @return string
     */
    public function getSiftAccountId()
    {
        return $this->encryptor->decrypt($this->config->getSiftAccountId());
    }
}
