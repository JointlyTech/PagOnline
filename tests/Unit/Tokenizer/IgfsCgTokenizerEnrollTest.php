<?php

namespace PagOnline\Tests\Unit\Tokenizer;

use PagOnline\Tests\Unit\IgfsCgBaseTest;
use PagOnline\Tokenizer\IgfsCgTokenizerEnroll;
use PagOnline\Exceptions\IgfsMissingParException;
use PagOnline\Tokenizer\Requests\IgfsCgTokenizerEnrollRequest;

/**
 * Class IgfsCgInitTest.
 */
class IgfsCgTokenizerEnrollTest extends IgfsCgBaseTest
{
    protected $igfsCgClass = IgfsCgTokenizerEnroll::class;
    protected $igfsCgRequest = IgfsCgTokenizerEnrollRequest::CONTENT;

    protected function setIgfsRequiredParamenters(&$class)
    {
        $class->pan = '123456';
        $class->expireMonth = '01';
        $class->expireYear = '2050';
        $class->payInstrToken = 'payInstrToken';
    }

    /** @test */
    public function shouldChecksFieldsAndRaiseExceptionMissingPan()
    {
        $this->expectException(IgfsMissingParException::class);
        $this->expectExceptionMessage('Missing pan');
        $foo = $this->getClassMethod('checkFields');
        $obj = $this->makeIgfsCg();
        $foo->invoke($obj);
    }

    /** @test */
    public function shouldChecksFieldsAndRaiseExceptionMissingExpireMonth()
    {
        $this->expectException(IgfsMissingParException::class);
        $this->expectExceptionMessage('Missing expireMonth');
        $foo = $this->getClassMethod('checkFields');
        $obj = $this->makeIgfsCg();
        $obj->pan = 'pan';
        $foo->invoke($obj);
    }

    /** @test */
    public function shouldChecksFieldsAndRaiseExceptionMissingExpireYear()
    {
        $this->expectException(IgfsMissingParException::class);
        $this->expectExceptionMessage('Missing expireYear');
        $foo = $this->getClassMethod('checkFields');
        $obj = $this->makeIgfsCg();
        $obj->pan = 'pan';
        $obj->expireMonth = '2025';
        $foo->invoke($obj);
    }

    /** @test */
    public function shouldChecksFieldsAndRaiseExceptionMissingPayInstrToken()
    {
        $this->expectException(IgfsMissingParException::class);
        $this->expectExceptionMessage('Missing payInstrToken');
        $foo = $this->getClassMethod('checkFields');
        $obj = $this->makeIgfsCg();
        $obj->pan = 'pan';
        $obj->expireYear = '2025';
        $obj->expireMonth = '12';
        $foo->invoke($obj);
    }

    /** @test */
    public function shouldCheckFieldsAndPass()
    {
        /** @var \PagOnline\Mpi\IgfsCgMpiAuth $obj */
        $obj = $this->makeIgfsCg();
        $foo = $this->getClassMethod('checkFields');
        $this->setIgfsRequiredParamenters($obj);
        $exception = null;
        try {
            $foo->invoke($obj);
        } catch (\Exception $exception) {
        }

        $this->assertNull($exception);
    }

    /** @test */
    public function shouldRaiseExceptionForMissingShopId()
    {
        $this->expectException(IgfsMissingParException::class);
        /** @var \PagOnline\Init\IgfsCgInit $obj */
        $obj = $this->makeIgfsCg();
        $obj->shopID = null;
        $foo = $this->getClassMethod('checkFields');
        $foo->invoke($obj);
    }
}
