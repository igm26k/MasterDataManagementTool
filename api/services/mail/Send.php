<?php

namespace app\services\mail;

use app\services\interfaces\ServiceInterface;
use Yii;
use yii\base\ErrorException;

/**
 * Class Send
 *
 * @package App\Service\Mail
 */
class Send implements ServiceInterface
{
    /**
     * Message params
     *
     * @var array
     */
    public $params = [
        'from'    => '',
        'to'      => '',
        'subject' => '',
        'text'    => '',
    ];

    /**
     * Default email sender
     *
     * @var string
     */
    public $defaultSender = 'MDMTool@igm26k.ru';

    /**
     * Validate object values
     * Returns true on success or array with errors
     *
     * @param $object
     *
     * @throws ErrorException
     */
    public function validate(ServiceInterface $object)
    {
        if (empty($object->params['from'])) {
            $object->params['from'] = $this->defaultSender;
        }

        foreach ($object->params as $key => $value) {
            if (empty($value)) {
                throw new ErrorException(
                    Yii::t('service_mail', 'Empty value in {key}', ['key' => $key])
                );
            }
        }
    }

    /**
     * Execute service
     *
     * @param ServiceInterface $object
     *
     * @return ServiceInterface
     * @throws ErrorException
     */
    public function execute(ServiceInterface $object): ServiceInterface
    {
        $result = Yii::$app->mailer->compose()
            ->setFrom($object->params['from'])
            ->setTo($object->params['to'])
            ->setSubject($object->params['subject'])
            ->setTextBody(strip_tags($object->params['text']))
            ->setHtmlBody($object->params['text'])
            ->send();

        if (!$result) {
            throw new ErrorException(
                Yii::t('service_mail', 'An error occurred while sending the letter')
            );
        }

        return $this;
    }
}
