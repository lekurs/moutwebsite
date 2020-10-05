<?php

namespace App\Http\Controllers\Auth\Google;

use App\Http\Controllers\Controller;
use App\Repository\OauthRepository;
use App\Repository\UserRepository;
use App\Services\GoogleService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    /** @var GoogleService $googleService */
    private GoogleService $googleService;

    /** @var OauthRepository $oAuthRepository */
    private OauthRepository $oAuthRepository;

    /**
     * DiscordController constructor.
     * @param GoogleService $googleService
     * @param OauthRepository $oAuthRepository
     */
    public function __construct(GoogleService $googleService, OauthRepository $oAuthRepository)
    {
        $this->googleService = $googleService;
        $this->oAuthRepository = $oAuthRepository;
    }

    /**
     * @return RedirectResponse
     */
    public function login()
    {
        return redirect()->away($this->googleService->authorizeUrl());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function callback(Request $request): RedirectResponse
    {
        try {
            $tokens = $this->googleService->getTokens();
            $user = $this->oAuthRepository->findByGoogleAccessToken($tokens['access_token'] ?? '');
            $user ??= $this->googleService->getUser($tokens);

            auth()->login($user);
            $user->save();

        } catch (RequestException $exception) {
            Log::error($exception->getMessage());
            return response()->json('A problem occured after run get request');
        }

        return response()->redirectToRoute('myfirstcontroller');
    }
}
