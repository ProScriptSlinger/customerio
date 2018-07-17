<?php

namespace Customerio\Endpoint;

class Customers extends Base
{
    /**
     * Register customer event
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function event(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('User id is required!', 'POST');
        }

        if (!isset($options['name'])) {
            $this->mockException('Name is required!', 'POST');
        }

        $path = $this->customerPath($options['id']);

        return $this->client->post($path."/events", $options);
    }

    /**
     * Add new customer
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('User id is required!', 'PUT');
        }

        if (!isset($options['email'])) {
            $this->mockException('Email is required!', 'PUT');
        }

        $path = $this->customerPath($options['id']);

        return $this->client->put($path, $options);
    }

    /**
     * Delete customer
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('User id is required!', 'DELETE');
        }

        $path = $this->customerPath($options['id']);

        return $this->client->delete($path, []);
    }

    /**
     * Update new customer
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $options)
    {
        return $this->add($options);
    }

    /**
     * Get customer by email address
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $options)
    {
        if (!isset($options['email'])) {
            $this->mockException('Email is required!', 'GET');
        }

        $path = $this->customerPath();

        return $this->client->get($path, $options);
    }

    /**
     * Search customers
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(array $options)
    {
        if (!isset($options['filter'])) {
            $this->mockException('Filter is required!', 'POST');
        }

        $path = $this->customerPath();
        $options['beta'] = true;

        return $this->client->post($path, $options);
    }

    /**
     * List customer attributes
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function attributes(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('User id is required!', 'GET');
        }

        $path = $this->customerPath($options['id'], ['attributes']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }

    /**
     * List customer segments
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function segments(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('User id is required!', 'GET');
        }

        $path = $this->customerPath($options['id'], ['segments']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }

    /**
     * Get metadata about messages sent to a customer
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function messages(array $options)
    {
        if (!isset($options['id'])) {
            $this->mockException('User id is required!', 'GET');
        }

        $path = $this->customerPath($options['id'], ['messages']);
        unset($options['id']);

        return $this->client->get($path, $options);
    }
}
