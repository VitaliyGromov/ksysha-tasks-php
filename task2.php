<?php

enum Type: string
{
	case B2b = 'b2b';
	case B2C = 'b2c';
}

interface Client
{
	public function getInfo(): string;
}

class User implements Client
{
	public function getInfo(): string
	{
		return 'I am user';
	}
}

class Bisnes implements Client
{
	public function getInfo(): string
	{
		return 'I am big boss';
	}
}


class ClientFactory
{
	public static function create(Type $type): Client
	{
		return match($type) {
			Type::B2C => new User,
			Type::B2b => new Bisnes,
		};
	}
}

$client =  ClientFactory::create(Type::B2b);
echo $client->getInfo();
